<?php

use Backend\Facades\BackendAuth;
use Cms\Classes\Controller;
use Cms\Classes\Theme;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Sanofi\Pdb\Classes\PDBListPage;
use Sanofi\Pdb\Classes\PDBMigration;
use Sanofi\Pdb\Models\PDBIngredient;
use Sanofi\Pdb\Models\PDBLiveProduct;
use Sanofi\Pdb\Models\PDBLiveProductVariant;
use Sanofi\Pdb\Models\PDBLiveProductVariantType;
use Sanofi\Pdb\Models\PDBProduct;
use Sanofi\Pdb\Models\PDBProductVariant;
use Sanofi\Pdb\Models\PDBSanmedicalRedirect;
use System\Models\File;
use Winter\Storm\Support\Facades\Input;
//use PDBMigration;

/**
 * Publishes all products
 */
Route::get('publishallproducts', function () {
    exit;
//    $products = PDBProduct::all();
//    foreach ($products as $product) {
//        $product->publish();
//    }
});

/**
 * Can be used to import and link product- / productvariant-images automatically
 * Dump of the imported media folder can be found in the dev folder in "media_files.zip"
 */
Route::get('importProductImages', function () {
    exit;
//    PDBMigration::migrateProductImages();
});

/**
 * Can be used to import and link the productvariant pdfs
 * A dump of the linked PDFs can be found in the dev folder in .pdf_uploads_protected.zip
 */
Route::get('importpdfs', function () {
    exit;
//    PDBMigration::migrateProductPDFs();
})->middleware('web');

/**
 * Used to create the sanmedical redirect data for the table 'sanofi_pdb_sanmedical_redirects'
 * The json used for the import can be found in the dev folder in .products.json
 */
Route::get('importPDFSanMedicalRedirects', function () {
    exit;
//    PDBMigration::importPDFSanMedicalRedirects();
})->middleware('web');

Route::post('pdb/fetchFilterLetters', function () {
    $filterByParam = Input::get('filterBy', 'products');
    $searchTermParam = Input::get('searchTerm', '');

    $preview = Input::get('preview', false);
    if ($preview) {
        $user = BackendAuth::getUser();
        if ($user == null) {
            $preview = false;
        }
    }

    $letters = [];
    $message = '';
    $status = 'success';

    $searchTermsRaw = trim($searchTermParam);
    $searchTerms = explode(' ', $searchTermsRaw);

    try {
        if (in_array($filterByParam, ['products', 'ingredients'])) {
            $query = null;
            $firstEntry = true;

            $rawEntries = [];

            if ($filterByParam == 'products') {
                foreach ($searchTerms as $term) {
                    $cleanTerm = trim($term);
                    if ($firstEntry) {
                        if ($preview) {
                            $query = PDBProduct::where('name', 'LIKE', '%' . $cleanTerm . '%');
                        } else {
                            $query = PDBLiveProduct::where('name', 'LIKE', '%' . $cleanTerm . '%');
                        }
                        $query = $query->orWhere('description', 'LIKE', '%' . $cleanTerm . '%');
                    } else {
                        $query = $query->orWhere('name', 'LIKE', '%' . $cleanTerm . '%');
                        $query = $query->orWhere('description', 'LIKE', '%' . $cleanTerm . '%');
                    }
                    $firstEntry = false;
                }

                $result = $query->get();

                foreach ($result as $entry) {
                    if ($filterByParam == 'products' && $entry->is_visible == 0) {
                        continue;
                    }

                    $rawEntries[] = $entry->name;
                }
            } else {
                $productSelect = 'SELECT ingredient_id, saning.name FROM sanofi_pdb_' . (!$preview ? 'live_' : '') . 'product_x_ingredients prod_x_ing ' .
                    'INNER JOIN sanofi_pdb_' . (!$preview ? 'live_' : '') . 'products sanprod ON sanprod.id = prod_x_ing.product_id ' .
                    'INNER JOIN sanofi_pdb_ingredients saning ON saning.id = prod_x_ing.ingredient_id ' .
                    'WHERE sanprod.is_visible = :visibility';

                $availableIngredients = Db::select($productSelect, ['visibility' => '1']);

                foreach ($availableIngredients as $entry) {
                    if (isset($entry->name)) {
                        $rawEntries[] = $entry->name;
                    }
                }
            }

            foreach ($rawEntries as $entryName) {
                if (!empty($entryName)) {
                    $startLetter = $entryName[0];

                    if (mb_ereg_match('/^[Ää]/', $entryName)) {
                        $startLetter = 'a';
                    } elseif (mb_ereg_match('/^[Öö]/', $entryName)) {
                        $startLetter = 'o';
                    } elseif (mb_ereg_match('/^[Üü]/', $entryName)) {
                        $startLetter = 'u';
                    }

                    if (!in_array($startLetter, $letters) && preg_match('/[a-zA-Z]/', $startLetter)) {
                        $letters[] = strtoupper($startLetter);
                    }
                }
            }

            sort($letters);
        }
    } catch (Exception $e) {
        $errMsg = $e->getMessage();
        $status = 'error';
        $errHash = md5($errMsg);
        $message = 'Es ist ein Fehler aufgetreten. Bitte kontaktieren Sie den Administrator mit folgendem Hash (#' . $errHash . ')';
        trace_log('#' . $errHash . ' => ' . $errMsg);
    }

    return [
        'status' => $status,
        'data' => $letters,
        'msg' => $message
    ];
})->middleware('web');


Route::post('pdb/fetchProducts', function () {
    $filterByParam = Input::get('filterBy', 'products');
    $searchTermParam = Input::get('searchTerm', '');
    $searchTermsActiveLetter = strtolower(Input::get('activeLetter', ''));

    $preview = Input::get('preview', false);
    if ($preview) {
        $user = BackendAuth::getUser();
        if ($user == null) {
            $preview = false;
        }
    }

    if (!preg_match('/^[a-z]$/', $searchTermsActiveLetter)) {
        $searchTermsActiveLetter = false;
    }

    $products = [];
    $message = '';
    $status = 'success';

    // For later usage, if further result reduce is required (e.g. for pagination & more)
//    $skip = Input::get('resultsFound', 0);
//    $take = 20;

    $searchTermsRaw = trim($searchTermParam);

    if (strlen($searchTermsRaw) == 0 || strlen($searchTermsRaw) >= 3) {
        $searchTermsRaw = str_replace(array(' ', ';', ','), '+', $searchTermsRaw);
        $searchTerms = explode('+', $searchTermsRaw);

        try {
            $products = PDBListPage::fetchProducts($filterByParam, $searchTerms, $searchTermsActiveLetter, $preview);
        } catch (Exception $e) {
            $errMsg = $e->getMessage();
            $status = 'error';
            $errHash = md5($errMsg);
            $message = 'Es ist ein Fehler aufgetreten. ' .
                       'Bitte kontaktieren Sie den Administrator mit folgendem Hash (#' . $errHash . ')';
            trace_log('#' . $errHash . ' => ' . $errMsg);
        }
    }

    return [
        'status' => $status,
        'data' => $products,
        'msg' => $message
    ];
})->middleware('web');


Route::get('files/{pdfType}/{pzn}/{fileName}', function ($pdfType, $pzn, $fileName) {
    // Check for sanmedical redirects first
    $sanMedicalRedirect = PDBSanmedicalRedirect::where('pzn', $pzn)->first();
    if (isset($sanMedicalRedirect->id)) {
        switch ($pdfType) {
            case 1:
                return Redirect::to($sanMedicalRedirect->pdf1);
                break;
            case 2:
                return Redirect::to($sanMedicalRedirect->pdf2);
                break;
        }
    }

    $productVariantType = PDBLiveProductVariantType::where('pzn', $pzn)->first();

    switch (intval($pdfType)) {
        case 1:
            $fileName = 'Gebrauchsinformation.pdf';
            break;
        case 2:
            $fileName = 'Fachinformation.pdf';
            break;
    }

    if (isset($productVariantType->id)) {
        return Redirect::to('/ext/data/' . $pdfType . '/' . $productVariantType->variant_id . '/' . $fileName);
    }

    // If no appropriate variant type can be found - show 404
    return App::make(Controller::class)->setStatusCode(404)->run('/404');
})->middleware('web');

// Used for external (published PDFs)
Route::get('ext/data/{pdfType}/{variantId}/{fileName}', function ($pdfType, $variantId, $fileName) {
    $pdfType = intval($pdfType);

    $productVariant = PDBLiveProductVariant::find($variantId);
    if (isset($productVariant->id)) {
        $product = PDBLiveProduct::find($productVariant->product_id);
        if (isset($product->id)) {
            if ($product->is_visible == 1 &&
                $productVariant->is_visible == 1) {
                showVariantPDF($pdfType, $productVariant);
            }
        }
    }

    // If nothing matches or if the product / productvariant is not visible - show 404
    return App::make(Controller::class)->setStatusCode(404)->run('/404');
})->middleware('web');

// Used for internal (non published PDFs)
Route::get('int/data/{pdfType}/{variantId}/{fileName}', function ($pdfType, $variantId, $fileName) {
    if (BackendAuth::getUser() == null) {
        return App::make(Controller::class)->setStatusCode(404)->run('/404');
    }

    $productVariant = PDBProductVariant::find($variantId);
    if (isset($productVariant->id)) {
        $product = PDBProduct::find($productVariant->product_id);
        if (isset($product->id)) {
            if ($product->is_visible == 1 &&
                $productVariant->is_visible == 1) {
                showVariantPDF($pdfType, $productVariant);
            }
        }
    }

    // If nothing matches or if the product / productvariant is not visible - show 404
    return App::make(Controller::class)->setStatusCode(404)->run('/404');
})->middleware('web');

/**
 * Shows the pdf of the given variant for the given pdfType
 *
 * @param $pdfType
 * @param $productVariant
 */
function showVariantPDF($pdfType, $productVariant)
{
    $downloadFileName = '';
    $pdfFilePath = '';
    $fileTitle = '';
    $variantName = $productVariant->name ?? '';
    $pdfFileName = '';

    switch ($pdfType) {
        case 1:
            if ($productVariant->pdf_file_one != null) {
                $pdfFilePath = $productVariant->pdf_file_one->getLocalPath();
                $fileTitle = $productVariant->pdf_file_one->title ?? '';
                $pdfFileName = $productVariant->pdf_file_one->file_name ?? '';
            }
            break;
        case 2:
            if ($productVariant->pdf_file_two != null) {
                $pdfFilePath = $productVariant->pdf_file_two->getLocalPath();
                $fileTitle = $productVariant->pdf_file_two->title ?? '';
                $pdfFileName = $productVariant->pdf_file_two->file_name ?? '';
            }
            break;
        default:
            return App::make(Controller::class)->setStatusCode(404)->run('/404');
    }

    if (!empty($fileTitle) && !empty($variantName)) {
        $downloadFileName = $fileTitle . '-' . $variantName;
        $downloadFileName = preg_replace('/[^a-zA-Z0-9]/', '-', $downloadFileName);
        $downloadFileName = preg_replace('/\-+/', '-', $downloadFileName);
        $downloadFileName = trim($downloadFileName, '-');
    }

    if (empty($downloadFileName)) {
        $downloadFileName = $pdfFileName;
    } else {
        $downloadFileName .= '.pdf';
    }

    header("Content-type:application/pdf");
    header("Content-Disposition:inline;filename=" . $downloadFileName);
    readfile($pdfFilePath);
    exit;
}
