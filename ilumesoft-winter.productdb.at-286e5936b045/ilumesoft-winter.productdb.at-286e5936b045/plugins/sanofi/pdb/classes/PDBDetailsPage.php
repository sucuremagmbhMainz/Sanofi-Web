<?php
namespace Sanofi\Pdb\Classes;

use Backend\Facades\Backend;
use Backend\Facades\BackendAuth;
use Cms\Classes\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Sanofi\Pdb\Models\PDBArea;
use Sanofi\Pdb\Models\PDBLiveProduct;
use Sanofi\Pdb\Models\PDBProduct;
use Winter\Storm\Exception\ApplicationException;
use Winter\Storm\Support\Facades\Input;

class PDBDetailsPage
{

    private static $paramStr = '';

    private static $fetchedParams = [];

    /**
     * @param string|array $paramData
     */
    public static function feedParamData($paramData)
    {
        self::storeParamDataRec(self::$fetchedParams, $paramData);
    }

    /**
     * Stores parameter data recursively
     * @param $storeInto
     * @param $paramData
     * @return void
     */
    private static function storeParamDataRec(&$storeInto, $paramData)
    {
        if (is_string($paramData)) {
            self::$paramStr = $paramData;
        } elseif (is_array($paramData)) {
            foreach ($paramData as $paramKey => $paramVal) {
                if (is_array($paramVal)) {
                    foreach ($paramVal as $subParamKey => $subParamVal) {
                        if (is_array($subParamVal)) {
                            self::storeParamDataRec(self::$fetchedParams[urldecode($paramKey) . '[' . urldecode($subParamKey) . ']'], $subParamVal);
                        } else {
                            self::$fetchedParams[urldecode($paramKey) . '[' . urldecode($subParamKey) . ']'] = urldecode($subParamVal);
                        }
                    }
                } else {
                    self::$fetchedParams[urldecode($paramKey)] = urldecode($paramVal);
                }
            }
        }
    }

    private static function prepareParams()
    {
        if (!empty(self::$paramStr)) {
            $paramEntries = explode('&', self::$paramStr);
            foreach ($paramEntries as $entry) {
                $kvPair = explode('=', $entry);
                if (count($kvPair) == 2) {
                    self::$fetchedParams[$kvPair[0]] = $kvPair[1];
                }
            }
        }
    }

    public static function hasParam($key)
    {

        if (empty(self::$fetchedParams)) {
            self::prepareParams();
        }

        if (empty(self::$fetchedParams)) {
            return false;
        }

        if (!key_exists($key, self::$fetchedParams)) {
            return false;
        }

        return true;
    }

    public static function getParam($key, $default = false)
    {
        return self::hasParam($key) ? self::$fetchedParams[$key] : $default;
    }

    public static function fetchProductDetails()
    {
        $productId = PDBDetailsPage::getParam('tx_products_products[product]');
        if (!$productId) {
            $productId = PDBDetailsPage::getParam('product');
        }

        $product = null;

        $previewActive = PDBDetailsPage::hasParam('preview') && (BackendAuth::getUser() != null);

        if ($previewActive) {
            $product = PDBProduct::where('id', $productId)->where('is_visible', 1)->first();
        } else {
            $product = PDBLiveProduct::where('id', $productId)->where('is_visible', 1)->first();
        }

        if ($product != null) {
            if (($area = PDBArea::find($product->area_id)) != null) {
                $product->areaName = $area->name;

                // A product, which is assigned to an inactive area, is not visible
                if ($area->is_active == 0) {
                    return null;
                }
            }

            $product->variants = $product->Produktvariante()->where('is_visible', 1)->get();

            $productImagePaths = [];
            if ($previewActive) {
                foreach ($product->raw_images as $rawPath) {
                    $productImagePaths[] = '/storage/app/media' . $rawPath['path'];
                }
            } else {
                foreach ($product->images as $imageFile) {
                    $productImagePaths[] = $imageFile->getPath();
                }
            }

            $product->imagePaths = $productImagePaths;

            foreach ($product->variants as $variant) {
                $variant->types = $variant->variantTypes()->get();

                if ($previewActive) {
                    $variant->imagePath = $variant->raw_image ? '/storage/app/media' . $variant->raw_image : null;
                } else {
                    $variant->imagePath = $variant->image ? $variant->image->getPath() : null;
                }

                $pdfFiles = [];
                $splitter = '&nbsp;&nbsp;|&nbsp;&nbsp;';
                if ($variant->pdf_file_one != null) {
                    $fileName = $variant->pdf_file_one->title;
                    if (empty($fileName)) {
                        $fileName = $variant->pdf_file_one->getFileName();
                    }

                    $fileDate = ((!empty($variant->pdf_one_date) && $variant->pdf_one_date != null) ? ($splitter . $variant->pdf_one_date) : '');
                    $fileSize = $splitter .  $variant->pdf_file_one->sizeToString();
                    $fileNameRef =  '/' . (isset($variant->pdf_file_one->title) && !empty($variant->pdf_file_one->title) ? $variant->pdf_file_one->title . '.pdf' : $fileName);

                    $pdfFiles[] = [
                        'fileName' => $fileName,
                        'fileDate' => $fileDate,
                        'fileSize' => $fileSize,
                        'path' => '/' . ($previewActive ? 'int' : 'ext') . '/data/1/' . $variant->id . $fileNameRef,
                    ];
                }

                if ($variant->pdf_file_two != null) {
                    $fileName = $variant->pdf_file_two->title;
                    if (empty($fileName)) {
                        $fileName = $variant->pdf_file_two->getFileName();
                    }

                    $fileDate = ((!empty($variant->pdf_two_date) && $variant->pdf_two_date != null) ? ($splitter . $variant->pdf_two_date) : '');
                    $fileSize = $splitter .  $variant->pdf_file_two->sizeToString();
                    $fileNameRef =  '/' . (isset($variant->pdf_file_two->title) && !empty($variant->pdf_file_two->title) ? $variant->pdf_file_two->title . '.pdf' : $fileName);

                    $pdfFiles[] = [
                        'fileName' => $fileName,
                        'fileDate' => $fileDate,
                        'fileSize' => $fileSize,
                        'path' => '/' . ($previewActive ? 'int' : 'ext') . '/data/2/' . $variant->id . $fileNameRef,
                    ];
                }

                $variant->pdfFiles = $pdfFiles;
            }

            if (isset($product->footnotes)) {
                $footNoteEntries = [];

                foreach ($product->footnotes as $note) {
                    $footNoteEntries[] = $note['text'];
                }

                $product->footNoteEntries = $footNoteEntries;
            }


            return $product;
        }

        return null;
    }
}
