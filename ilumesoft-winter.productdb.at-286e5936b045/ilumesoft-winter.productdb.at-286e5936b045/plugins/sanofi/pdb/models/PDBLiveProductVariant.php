<?php namespace Sanofi\Pdb\Models;

use Model;

/**
 * Model
 */
class PDBLiveProductVariant extends PDBProductVariant
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'sanofi_pdb_live_product_variants';

    public $jsonable = [ ];

    public $rules = [ ];

    public $hasMany = [
        'variantTypes' => [
            '\Sanofi\Pdb\Models\PDBLiveProductVariantType',
            'table'    => 'sanofi_pdb_live_product_variant_type',
            'key'      => 'variant_id',
            'otherKey' => 'id',
            'delete'   => true
        ]
    ];

    public $attachOne = [
        'image' => [
            'System\Models\File',
            'public' => true,
            'delete' => true
        ],
        'pdf_file_one' => [
            'System\Models\File',
            'public' => true,
            'delete' => true
        ],
        'pdf_file_two' => [
            'System\Models\File',
            'public' => true,
            'delete' => true
        ]
    ];

    public $fillable = [
        'id',
        'is_visible',
        'product_id',
        'name',
        'description',
        'is_prescription_required',
        'is_pharmacy_required',
        'is_nutritional_supplement',
        'is_cosmetic',
        'is_medicine',
        'pdf_one_date',
        'pdf_two_date',
        'sort_order',
    ];

    public function beforeSave()
    {
        /** Overwrite base method to deny usage on Live Model */
    }

    public function afterFetch()
    {
        /** Overwrite base method to deny usage on Live Model */
    }

    public function afterCreate()
    {
        /** Overwrite base method to deny usage on Live Model */
    }

    public function afterSave()
    {
        /** Overwrite base method to deny usage on Live Model */
    }

    public function beforeCreate()
    {
        /** Overwrite base method to deny usage on Live Model */
    }

    public function beforeUpdate()
    {
        /** Overwrite base method to deny usage on Live Model */
    }
}
