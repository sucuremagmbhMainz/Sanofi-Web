<?php namespace Sanofi\Pdb\Models;

use DateTime;
use Illuminate\Support\Facades\Log;
use Model;
use Sanofi\Pdb\Classes\PDBProductException;
use Sanofi\Pdb\Classes\Traits\SortableRelation;
use System\Models\File;
use Winter\Storm\Exception\ApplicationException;
use Winter\Storm\Support\Facades\Flash;

/**
 * Model
 */
class PDBProduct extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use SortableRelation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sanofi_pdb_products';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'area_id' => 'required',
        'ingredient_type' => 'required',
        'raw_images' => 'max:15',
    ];

    public $customMessages = [
        'max' => 'Es dürfen nicht mehr als :max Produktbilder zugewiesen werden.',
    ];

    public $hasOne = [
        'area' => [
            '\Sanofi\Pdb\Models\PDBArea',
            'key' => 'id',
            'other_key' => 'area_id'
        ]
    ];

    public $belongsToMany = [
        'ingredients' => [
            '\Sanofi\Pdb\Models\PDBIngredient',
            'table'    => 'sanofi_pdb_product_x_ingredients',
            'key'      => 'product_id',
            'otherKey' => 'ingredient_id',
            'order' => 'name ASC',
        ]
    ];

    public $hasMany = [
        'Produktvariante' => [
            '\Sanofi\Pdb\Models\PDBProductVariant',
            'table'    => 'sanofi_pdb_product_variants',
            'key'      => 'product_id',
            'otherKey' => 'id',
            'delete'   => true,
            'sortOrder' => 'sort_order',
        ]
    ];

    public $fillable = [
        'is_visible',
        'name',
        'area_id',
        'description',
        'ingredient_type',
        'color_main',
        'color_sub'
    ];

    public $jsonable = [
        'raw_images',
        'footnotes',
    ];

    public function getIngredientsOptions() {

        $result = [];

        foreach (PDBIngredient::all() as $group) {
            $result[$group->id] = [$group->name];
        }

        return $result;
    }

    public function beforeDelete()
    {
        parent::beforeDelete();

        // Cleanup live pendant
        $pdbLiveProduct = PDBLiveProduct::find($this->id);
        if ($pdbLiveProduct !== null) {
            $pdbLiveProduct->delete();
        }
    }

    /**
     * Prepares the dropdown array for the area select
     *
     * @return array
     */
    public function getAreaIdOptions() {

        $areaEntries = PDBArea::where('is_active', '1')->get();
        $dropdownData = [];

        foreach ($areaEntries as $entry) {
            $dropdownData[$entry->id] = $entry->name;
        }

        return $dropdownData;
    }

    /**
     * Prepares the dropdown array for the ingredient type select
     *
     * @return array
     */
    public function getIngredientTypeOptions() {
        return [
            '1' => 'Inhaltsstoffe',
            '2' => 'Wirkstoffe',
            '3' => 'Indikation',
        ];
    }

    private function cleanupIndicationContents() {
        $ingredientTypes = $this->getIngredientTypeOptions();
        $indicationId = false;

        foreach ($ingredientTypes as $key => $type) {
            if ($type == 'Indikation') {
                $indicationId = $key;
            }
        }

        if ($indicationId != false && $this['ingredient_type'] == $indicationId) {
            $this->ingredients = [];
        }
    }

    public function beforeCreate() {
        $this->cleanupIndicationContents();
    }

    public function beforeSave() {
        $this->cleanupIndicationContents();
    }

    /**
     * Publishes the current PDBProduct
     *
     * @return bool true, if no error occured / throws an PDBProductException otherwise
     * @throws PDBProductException
     */
    public function publish() {
        $productId = $this->id;

        $mediaRootPath = base_path().
            DIRECTORY_SEPARATOR.
            'storage'.
            DIRECTORY_SEPARATOR.
            'app'.
            DIRECTORY_SEPARATOR.
            'media';

        if ($productId !== null) {
            $isProductVisible = $this->is_visible;

            $pdbLiveProduct = PDBLiveProduct::find($productId);
            if ($pdbLiveProduct !== null) {
                $pdbLiveProduct->delete();
            }

            $pdbLiveProduct = new PDBLiveProduct();
            $pdbLiveProduct->id = $productId;

            // Override ingredients with new ingredients list
            $pdbLiveProduct->ingredients = $this->ingredients;

            $pdbLiveProduct->fill($this->attributes);

            $pdbLiveProduct->footnotes = $this->footnotes;

            if ($this->raw_images != null) {
                foreach ($this->raw_images as $rawImage) {
                    $relImgPath = $rawImage['path'] ?? null;
                    if ($relImgPath !== null && !empty($relImgPath)) {
                        $absImgPath = $mediaRootPath . $relImgPath;
                        $fileName = trim($relImgPath, '\/');
                        $fileWithoutExt = (strpos($fileName, '.') !== false) ? explode('.', $fileName)[0] : $fileName;

                        $imgFile = new File();
                        $imgFile->fromFile($absImgPath);
                        $imgFile->file_name = $fileName;
                        $imgFile->title = $fileWithoutExt;
                        $imgFile->description = '';
                        $imgFile->is_public = $isProductVisible;

                        $pdbLiveProduct->images()->add($imgFile);
                    }
                }
            }

            if ($pdbLiveProduct->push()) {
                // Create live product variants
                foreach ($this->Produktvariante as $variant) {
                    if ($variant->is_visible == 0) {
                        continue;
                    }

                    $newLiveVariantEntry = new PDBLiveProductVariant();
                    $newLiveVariantEntry->fill($variant->attributes);

                    foreach ($variant->variantTypes as $type) {
                        $typeData = json_decode($type, true);
                        $newVariantType = new PDBLiveProductVariantType();
                        $newVariantType->fill($typeData);
                        $newLiveVariantEntry->variantTypes()->add($newVariantType);
                    }

                    // Prepare the files visibility (product image and pdfs) dependant on the product + variant visibility
                    $fileVisibility = $isProductVisible & $pdbLiveProduct->is_visible;

                    if ($variant->raw_image !== null && !empty($variant->raw_image)) {
                        $relImgPath = $variant->raw_image;
                        $absImgPath = $mediaRootPath . $relImgPath;
                        $fileName = trim($relImgPath, '\/');
                        $fileWithoutExt = (strpos($fileName, '.') !== false) ? explode('.', $fileName)[0] : $fileName;

                        $imgFile = new File();
                        $imgFile->fromFile($absImgPath);
                        $imgFile->file_name = $fileName;
                        $imgFile->title = $fileWithoutExt;
                        $imgFile->description = '';
                        $imgFile->is_public = $fileVisibility;
                        $newLiveVariantEntry->image()->setSimpleValue($imgFile);
                    }

                    if ($variant->pdf_file_one != null) {
                        $pdfUseCopy = new File();
                        $pdfUseCopy->fromFile(
                            base_path().
                            DIRECTORY_SEPARATOR.
                            'storage'.
                            DIRECTORY_SEPARATOR.
                            'app'.
                            DIRECTORY_SEPARATOR.
                            $variant->pdf_file_one->getDiskPath());
                        $pdfUseCopy->file_name = $variant->pdf_file_one->file_name;
                        $pdfUseCopy->title = $variant->pdf_file_one->title;
                        $pdfUseCopy->description = $variant->pdf_file_one->description;
                        $pdfUseCopy->is_public = $fileVisibility;
                        $newLiveVariantEntry->pdf_file_one()->setSimpleValue($pdfUseCopy);
                    }

                    if ($variant->pdf_file_two != null) {
                        $pdfTechnicalCopy = new File();
                        $pdfTechnicalCopy->fromFile(
                            base_path().
                            DIRECTORY_SEPARATOR.
                            'storage'.
                            DIRECTORY_SEPARATOR.
                            'app'.
                            DIRECTORY_SEPARATOR.
                            $variant->pdf_file_two->getDiskPath());
                        $pdfTechnicalCopy->file_name = $variant->pdf_file_two->file_name;
                        $pdfTechnicalCopy->title = $variant->pdf_file_two->title;
                        $pdfTechnicalCopy->description = $variant->pdf_file_two->description;
                        $pdfTechnicalCopy->is_public = $fileVisibility;
                        $newLiveVariantEntry->pdf_file_two()->setSimpleValue($pdfTechnicalCopy);
                    }

                    $newLiveVariantEntry->save();
                }

                return true;
            } else {
                throw new PDBProductException('Die Produkteinstellungen von "' . $pdbLiveProduct->name .'" konnten nicht veröffentlicht werden');
            }
        } else {
            throw new PDBProductException('Das Produkt konnte nicht gefunden werden');
        }
    }
}
