<?php
namespace Sanofi\Pdb\Classes;

use Cms\Classes\Theme;
use Illuminate\Support\Facades\DB;
use Sanofi\Pdb\Models\PDBProduct;
use System\Models\File;

class PDBMigration
{

    private function __construct()
    {
    }

    /**
     * Important note: This method can only link the images to products and product variants,
     * if they have been previously setup in the database in the related tables
     * ( e.g. ..._products and ..._product_variants)
     *
     * @return void
     */
    public static function migrateProductImages()
    {
        try {
            $query = DB::table('tx_products_domain_model_product')
                ->select(
                    'tx_products_domain_model_product.uid',
                    'tx_products_domain_model_product.title as product_title',
                    'sys_file.identifier',
                    'sys_file.name',
                    'sys_file_reference.title',
                    'sys_file_reference.description'
                )

                ->join('sys_file_reference', function ($join) {
                    $join->on('sys_file_reference.uid_foreign', '=', 'tx_products_domain_model_product.uid')
                        ->where('sys_file_reference.deleted', '=', 0)
                        ->where('sys_file_reference.hidden', '=', 0)
                        ->where('sys_file_reference.tablenames', '=', 'tx_products_domain_model_product');
                })

                ->join('sys_file', 'sys_file.uid', '=', 'sys_file_reference.uid_local')

                ->where('tx_products_domain_model_product.deleted', '=', 0)
                ->where('tx_products_domain_model_product.hidden', '=', 0);

            $result = $query->get();

            $mediaRootPath = base_path().
                DIRECTORY_SEPARATOR.
                'storage'.
                DIRECTORY_SEPARATOR.
                'app'.
                DIRECTORY_SEPARATOR.
                'media';

            foreach ($result as $imgDataEntry) {
                $productId = $imgDataEntry->uid;

                $product = PDBProduct::find($productId);
                if ($product !== null) {
                    $relProductFolderPath = DIRECTORY_SEPARATOR . preg_replace('/-+/', '-', preg_replace('/[^a-z0-9-]/', '', preg_replace('/\s+/', '-', strtolower($imgDataEntry->product_title))));
                    $productMediaPath = $mediaRootPath . DIRECTORY_SEPARATOR . 'products' . $relProductFolderPath;

                    if (!file_exists($productMediaPath)) {
                        mkdir($productMediaPath, 0777, true);
                    }

                    if (!isset($imgDataEntry->identifier) || $imgDataEntry->identifier == null || empty($imgDataEntry->identifier)) {
                        dump("Error missing product data");
                        dd($imgDataEntry);
                    }
                    $imgDownloadUrl = 'https://www.sanofi-produktdatenbank.at/fileadmin' . $imgDataEntry->identifier;
                    $imgFileName = $imgDataEntry->name;

                    $targetImageFilePath = $productMediaPath . DIRECTORY_SEPARATOR . $imgFileName;
                    $relTargetImageFilePath = DIRECTORY_SEPARATOR . 'products' . $relProductFolderPath . DIRECTORY_SEPARATOR . $imgFileName;

                    if (!self::validateImageUrl($imgDownloadUrl)) {
                        dump("Missing image for product");
                        dd($imgDataEntry);
                    }

                    file_put_contents($targetImageFilePath, fopen($imgDownloadUrl, 'r'));

                    $product->raw_images = [[
                        'path' => $relTargetImageFilePath,
                    ]];

                    $product->save();

                    dump($product->name);

                    foreach ($product->Produktvariante as $variant) {
                        $query = DB::table('tx_products_domain_model_variant')
                            ->select(
                                'tx_products_domain_model_variant.uid',
                                'tx_products_domain_model_variant.title as product_title',
                                'sys_file.identifier',
                                'sys_file.name',
                                'sys_file_reference.title',
                                'sys_file_reference.description'
                            )

                            ->join('sys_file_reference', function ($join) {
                                $join->on('sys_file_reference.uid_foreign', '=', 'tx_products_domain_model_variant.uid')
                                    ->where('sys_file_reference.deleted', '=', 0)
                                    ->where('sys_file_reference.hidden', '=', 0)
                                    ->where('sys_file_reference.tablenames', '=', 'tx_products_domain_model_variant');
                            })

                            ->join('sys_file', 'sys_file.uid', '=', 'sys_file_reference.uid_local')

                            ->where('tx_products_domain_model_variant.deleted', '=', 0)
                            ->where('tx_products_domain_model_variant.hidden', '=', 0)
                            ->where('tx_products_domain_model_variant.uid', '=', $variant->id)
                            ->where('tx_products_domain_model_variant.product', '=', $product->id);

                        $resultEntry = $query->first();

                        if ($resultEntry !== null) {
                            dump('>> ' . $variant->name);

                            $relProductVariantFolderPath = DIRECTORY_SEPARATOR . preg_replace('/-+/', '-', preg_replace('/[^a-z0-9-]/', '', preg_replace('/\s+/', '-', strtolower($resultEntry->product_title))));
                            $productVariantMediaPath = $productMediaPath . $relProductVariantFolderPath;

                            if (!file_exists($productVariantMediaPath)) {
                                mkdir($productVariantMediaPath, 0777, true);
                            }

                            if (!isset($resultEntry->identifier) || $resultEntry->identifier == null || empty($resultEntry->identifier)) {
                                dump("Error missing variant image data");
                                dd($resultEntry);
                            }
                            $imgDownloadUrl = 'https://www.sanofi-produktdatenbank.at/fileadmin' . $resultEntry->identifier;
                            $imgFileName = $resultEntry->name;

                            dump('>> >> ' . $imgDownloadUrl);

                            $targetImageFilePath = $productVariantMediaPath . DIRECTORY_SEPARATOR . $imgFileName;
                            $relTargetImageFilePath = DIRECTORY_SEPARATOR . 'products' . $relProductFolderPath . $relProductVariantFolderPath . DIRECTORY_SEPARATOR . $imgFileName;

                            if (!self::validateImageUrl($imgDownloadUrl)) {
                                dump("Missing image for product variant");
                                dd($resultEntry);
                            }

                            file_put_contents($targetImageFilePath, fopen($imgDownloadUrl, 'r'));

                            $variant->raw_image = $relTargetImageFilePath;

                            $variant->save();
                        }
                    }
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        dd("done");
    }

    public static function validateImageUrl($url)
    {
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //enable headers
        curl_setopt($ch, CURLOPT_HEADER, 1);
        //get only headers
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        // $output contains the output string
        $output = curl_exec($ch);

        $info = curl_getinfo($ch);
        // close curl resource to free up system resources
        curl_close($ch);

        if (isset($info['http_code']) && !empty($info['http_code']) && $info['http_code'] == 200) {
            return true;
        }

        return false;
    }

    public static function migrateProductPDFs()
    {
        try {
            $oldPdbBaseUrl = 'https://www.sanofi-produktdatenbank.at/';
            $theme = Theme::getActiveTheme();
            $themePath = $theme->getPath();

            $basePdfDir = $themePath . '/pdfdata';

            if (!file_exists($basePdfDir)) {
                mkdir($basePdfDir);
            }

            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");

            $count = 0;
            $pdbProducts = PDBProduct::all();
            foreach ($pdbProducts as $productEntry) {
                $count++;

                dump('[P] ' . $productEntry->name);

                $productPdfBasePath = $basePdfDir . '/' . $productEntry->id;

                if (!file_exists($productPdfBasePath)) {
                    mkdir($productPdfBasePath);
                }

                touch($productPdfBasePath . '/_' . str_replace('/', '', $productEntry->name) . '.info');

                $productVariants = $productEntry->Produktvariante;

                foreach ($productVariants as $varEntry) {
                    $variantPdfBasePath = $productPdfBasePath . '/' . $varEntry->id;

                    if ($varEntry->is_visible == 1) {
                        if (!file_exists($variantPdfBasePath)) {
                            mkdir($variantPdfBasePath);
                        }

                        $productPDFCount = 0;
                        $productVariantUsePdfFound = false;
                        $productVariantTechnicalPdfFound = false;

    //                dump('>> ' . $varEntry->name);

                        $productVariantTypes = $varEntry->variantTypes;
                        foreach ($productVariantTypes as $varTypeEntry) {
    //                    dump('>> >> >> ' . $varTypeEntry->pzn);

                            $pdfUrlUse = $oldPdbBaseUrl . 'files/1/' . $varTypeEntry->pzn . '/Gebrauchsinformation.pdf';
                            $pdfUrlTechnical = $oldPdbBaseUrl . 'files/2/' . $varTypeEntry->pzn . '/Fachinformation.pdf';

                            if (self::validatePDFDataResourceUrl($pdfUrlUse)) {
                                $productPDFCount++;
                                if (!$productVariantUsePdfFound) {
                                    $productVariantUsePdfFound = true;
                                    if (!file_exists($variantPdfBasePath . "/Gebrauchsinformation.pdf")) {
                                        file_put_contents($variantPdfBasePath . "/Gebrauchsinformation.pdf", fopen($pdfUrlUse, 'r'));
                                    }
                                } else {
                                    dd("Error Multiple Use PDF found for same Variant");
                                }
                            }
                            if (self::validatePDFDataResourceUrl($pdfUrlTechnical)) {
                                $productPDFCount++;
                                if (!$productVariantTechnicalPdfFound) {
                                    $productVariantTechnicalPdfFound = true;
                                    if (!file_exists($variantPdfBasePath . "/Fachinformation.pdf")) {
                                        file_put_contents($variantPdfBasePath . "/Fachinformation.pdf", fopen($pdfUrlTechnical, 'r'));
                                    }
                                } else {
                                    dd("Error Multiple Technical PDF found for same Variant");
                                }
                            }
                        }

                        if (!$productVariantUsePdfFound && !$productVariantTechnicalPdfFound) {
                            touch($variantPdfBasePath . '/_NOTHING.info');
                            dd("no pdf linked in any form");
                        } elseif (!$productVariantUsePdfFound) {
                            touch($variantPdfBasePath . '/_ONLY_TECH.info');

                            // Upload Use (#2)
                            $filePDFPath = $variantPdfBasePath . "/Fachinformation.pdf";
                            $pdfFile = self::createPDFFileFromPath($filePDFPath);
                            $varEntry->pdf_file_two()->setSimpleValue($pdfFile);

                            $varEntry->save();
                        } elseif (!$productVariantTechnicalPdfFound) {
                            touch($variantPdfBasePath . '/_ONLY_USE.info');

                            // Upload Use (#1)
                            $filePDFPath = $variantPdfBasePath . "/Gebrauchsinformation.pdf";
                            $pdfFile = self::createPDFFileFromPath($filePDFPath);
                            $varEntry->pdf_file_one()->setSimpleValue($pdfFile);

                            $varEntry->save();
                        } else {
                            // Upload both

                            // Upload Use (#1)
                            $filePDFPath = $variantPdfBasePath . "/Gebrauchsinformation.pdf";
                            $pdfFile = self::createPDFFileFromPath($filePDFPath);
                            $varEntry->pdf_file_one()->setSimpleValue($pdfFile);

                            // Upload Use (#2)
                            $filePDFPath = $variantPdfBasePath . "/Fachinformation.pdf";
                            $pdfFile = self::createPDFFileFromPath($filePDFPath);
                            $varEntry->pdf_file_two()->setSimpleValue($pdfFile);

                            $varEntry->save();
                        }
                    } else {
                        if (file_exists($variantPdfBasePath)) {
                            rmdir($variantPdfBasePath);
                        }
                    }
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        dd("done");
    }

    private static function createPDFFileFromPath($pdfFilePath)
    {
        $filename = basename($pdfFilePath);
        $filenameWithoutExt = basename($filename, '.pdf');

        $pdfFile = new File();
        $pdfFile->fromFile($pdfFilePath);
        $pdfFile->file_name = $filename;
        $pdfFile->title = $filenameWithoutExt;
        $pdfFile->description = $filenameWithoutExt;
        $pdfFile->is_public = false;

        return $pdfFile;
    }

    private static function validatePDFDataResourceUrl($url)
    {
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //enable headers
        curl_setopt($ch, CURLOPT_HEADER, 1);
        //get only headers
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        $headers = [];
        $output = rtrim($output);
        $data = explode("\n", $output);
        $headers['status'] = $data[0];
        array_shift($data);

        foreach ($data as $entry) {
            if (strpos($entry, 'application/pdf')) {
                return true;
            }
        }

        return false;
    }

    public static function importPDFSanMedicalRedirects()
    {
        $devPath = base_path() . '/.development';
        $jsonPath = $devPath . '/products.json';

        $failedEntries = [];

        if (file_exists($jsonPath)) {
            if (($fileContents = file_get_contents($jsonPath)) !== false) {
                if (($jsonContents = json_decode($fileContents)) !== false) {
                    foreach ($jsonContents as $entry) {
                        if (isset($entry->pzn) &&
                            (isset($entry->{'1'}) || isset($entry->{'2'}))) {
                            $newRedirectEntry = new PDBSanmedicalRedirect();
                            $newRedirectEntry->pzn = $entry->pzn;
                            $newRedirectEntry->pdf1 = isset($entry->{'1'}) ? $entry->{'1'}->url : null;
                            $newRedirectEntry->pdf2 = isset($entry->{'2'}) ? $entry->{'2'}->url : null;
                            $newRedirectEntry->save();
                        } else {
                            $failedEntries[] = $entry;
                        }
                    }

                    echo '<h1>Failed Entries</h1>';
                    dd($failedEntries);
                } else {
                    dd('Couldn\'t parse json');
                }
            } else {
                dd('Couldn\'t read contents');
            }
        } else {
            dd('File doesn\'t exist');
        }
    }
}
