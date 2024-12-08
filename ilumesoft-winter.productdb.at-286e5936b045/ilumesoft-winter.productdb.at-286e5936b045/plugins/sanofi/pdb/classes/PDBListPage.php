<?php

namespace Sanofi\Pdb\Classes;

use Illuminate\Support\Facades\DB;
use Sanofi\Pdb\Models\PDBArea;
use Sanofi\Pdb\Models\PDBLiveProduct;
use Sanofi\Pdb\Models\PDBProduct;

class PDBListPage
{
    /*
     * @return array
     */
    public static function fetchProducts($filterByParam, $searchTerms, $searchTermsActiveLetter, $preview): array
    {
        $products = [];

        if (in_array($filterByParam, ['products', 'ingredients'])) {
            $query = '';
            $queryParams = [];

            $query = 'SELECT prod.id FROM sanofi_pdb_' . (!$preview ? 'live_' : '') .  'products prod';

            $whereQuery = "";

            $preparedQueries = [];

            if ($filterByParam == 'products') {
                $query .= ' LEFT JOIN sanofi_pdb_areas prodarea ON prodarea.id = prod.area_id';
                $query .= ' LEFT JOIN sanofi_pdb_' . (!$preview ? 'live_' : '') .  'product_variants prodvar ON prodvar.product_id = prod.id';
                $query .= ' LEFT JOIN sanofi_pdb_' . (!$preview ? 'live_' : '') .  'product_variant_type prodvartype ON prodvartype.variant_id = prodvar.id';

                if ($searchTermsActiveLetter !== false) {
                    $whereQuery = "(prod.name LIKE ? OR prod.name LIKE ?)";
                    $queryParams[] = strtolower($searchTermsActiveLetter) . "%";
                    $queryParams[] = strtoupper($searchTermsActiveLetter) . "%";
                }

                $preparedQueries = [];

                $rawWhere = '';

                foreach ($searchTerms as $term) {
                    $cleanTerm = strtolower(trim($term));
                    if (!empty($cleanTerm)) {
                        $lowerTerm = $cleanTerm;
                        $upperTerm = strtoupper($cleanTerm);

                        $preparedQueries[] = 'LOWER(prodarea.name) LIKE ?';
                        $preparedQueries[] = 'UPPER(prodarea.name) LIKE ?';
                        $queryParams[] = "%" .$lowerTerm . "%";
                        $queryParams[] = "%" .$upperTerm . "%";

                        $preparedQueries[] = 'LOWER(prod.name) LIKE ?';
                        $preparedQueries[] = 'UPPER(prod.name) LIKE ?';
                        $preparedQueries[] = 'LOWER(prod.description) LIKE ?';
                        $preparedQueries[] = 'UPPER(prod.description) LIKE ?';
                        $queryParams[] = "%" .$lowerTerm . "%";
                        $queryParams[] = "%" .$upperTerm . "%";
                        $queryParams[] = "%" .$lowerTerm . "%";
                        $queryParams[] = "%" .$upperTerm . "%";

                        $preparedQueries[] = 'LOWER(prodvar.name) LIKE ?';
                        $preparedQueries[] = 'UPPER(prodvar.name) LIKE ?';
                        $preparedQueries[] = 'LOWER(prodvar.description) LIKE ?';
                        $preparedQueries[] = 'UPPER(prodvar.description) LIKE ?';
                        $queryParams[] = "%" .$lowerTerm . "%";
                        $queryParams[] = "%" .$upperTerm . "%";
                        $queryParams[] = "%" .$lowerTerm . "%";
                        $queryParams[] = "%" .$upperTerm . "%";


                        $preparedQueries[] = 'LOWER(prodvartype.pzn) LIKE ?';
                        $preparedQueries[] = 'UPPER(prodvartype.pzn) LIKE ?';
                        $queryParams[] = "%" .$lowerTerm . "%";
                        $queryParams[] = "%" .$upperTerm . "%";
                    }
                }
            } else {
                $query .= ' LEFT JOIN sanofi_pdb_' . (!$preview ? 'live_' : '') .
                          'product_x_ingredients prod_x_ing ON prod_x_ing.product_id = prod.id';
                $query .= ' LEFT JOIN sanofi_pdb_ingredients ing ON ing.id = prod_x_ing.ingredient_id';

                if ($searchTermsActiveLetter !== false) {
                    $whereQuery = "(ing.name LIKE ? OR ing.name LIKE ?)";
                    $queryParams[] = strtolower($searchTermsActiveLetter) . "%";
                    $queryParams[] = strtoupper($searchTermsActiveLetter) . "%";
                }

                $rawWhere = '';

                foreach ($searchTerms as $term) {
                    $cleanTerm = strtolower(trim($term));
                    if (!empty($cleanTerm)) {
                        $lowerTerm = $cleanTerm;
                        $upperTerm = strtoupper($cleanTerm);

                        $preparedQueries[] = 'LOWER(ing.name) LIKE ?';
                        $preparedQueries[] = 'UPPER(ing.name) LIKE ?';

                        $queryParams[] = "%" .$lowerTerm . "%";
                        $queryParams[] = "%" .$upperTerm . "%";
                    }
                }
            }

            foreach ($preparedQueries as $queryEntry) {
                if (empty($rawWhere)) {
                    $rawWhere = "(" . $queryEntry;
                } else {
                    $rawWhere = $rawWhere . " OR " . $queryEntry;
                }
            }

            if (!empty($rawWhere)) {
                $rawWhere = $rawWhere . ")";

                if (empty($whereQuery)) {
                    $whereQuery = $rawWhere;
                } else {
                    $whereQuery = $whereQuery . " AND " . $rawWhere;
                }
            }

            if (!empty($whereQuery)) {
                $query = $query . " WHERE " . $whereQuery;
            }

            $result = Db::select($query, $queryParams);
            $modelQuery = null;

            foreach ($result as $resultEntry) {
                if ($modelQuery == null) {
                    if ($preview) {
                        $modelQuery = PDBProduct::where('id', $resultEntry->id);
                    } else {
                        $modelQuery = PDBLiveProduct::where('id', $resultEntry->id);
                    }
                } else {
                    $modelQuery = $modelQuery->orWhere('id', $resultEntry->id);
                }
            }

            if ($modelQuery != null) {
                $modelQuery->orderBy('name', 'ASC');

                $modelResults = $modelQuery->get();

                foreach ($modelResults as $resultEntry) {
                    $productArea = PDBArea::find($resultEntry->area_id);
                    if ($resultEntry->is_visible == 0 || ($productArea != null && $productArea->is_active == 0)) {
                        continue;
                    }

                    $rawIngredients = $resultEntry->ingredients()->get();
                    $ingredients = '';

                    foreach ($rawIngredients as $ingredientEntry) {
                        $ingredients = $ingredients . (!empty($ingredients) ? ', ' : '') . preg_replace('/(<([^>]+)>)/', '', $ingredientEntry->name);
                    }

                    $firstProductImg = '';

                    if ($preview) {
                        $rawPath = ($resultEntry->raw_images != null && isset($resultEntry->raw_images[0]) && isset($resultEntry->raw_images[0]['path'])) ? $resultEntry->raw_images[0]['path'] : '';
                        $firstProductImg = !empty($rawPath) ? ('/storage/app/media' . $rawPath) : '';
                    } else {
                        $path = ($resultEntry->images != null && isset($resultEntry->images[0]) && isset($resultEntry->images[0]['path'])) ? $resultEntry->images[0]['path'] : '';
                        $firstProductImg = !empty($path) ? $path : '';
                    }

                    $products[] = [
                        'name' => '<span>' . str_replace('®', '<sup>®</sup>', $resultEntry->name) . '</span>',
                        'ingredients' => $ingredients,
                        'img' => $firstProductImg,
                        'url' => '/pdb/details?product=' . $resultEntry->id . ($preview ? '&preview=1' : ''),
                    ];
                }
            }
        }

        return $products;
    }
}
