<?php namespace Sanofi\Pdb\Models;

use Model;

/**
 * Model
 */
class PDBProductVariantType extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sanofi_pdb_product_variant_type';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasOne = [
        'area' => [
            '\Sanofi\Pdb\Models\PDBProductVariant',
            'key' => 'id',
            'other_key' => 'variant_id'
        ]
    ];

    public $fillable = [
        'id',
        'pzn',
        'amount',
    ];
}
