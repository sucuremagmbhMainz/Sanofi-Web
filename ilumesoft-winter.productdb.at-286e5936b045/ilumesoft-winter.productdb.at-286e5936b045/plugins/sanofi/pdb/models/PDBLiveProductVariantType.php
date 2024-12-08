<?php namespace Sanofi\Pdb\Models;

use Model;
use Winter\Storm\Exception\ApplicationException;

/**
 * Model
 */
class PDBLiveProductVariantType extends PDBProductVariantType
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sanofi_pdb_live_product_variant_type';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasOne = [
        'area' => [
            '\Sanofi\Pdb\Models\PDBLiveProductVariant',
            'key' => 'id',
            'other_key' => 'variant_id'
        ]
    ];
}
