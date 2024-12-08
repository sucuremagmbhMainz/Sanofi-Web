<?php namespace Sanofi\Pdb\Models;

use DateTime;
use Model;
use Winter\Storm\Exception\ApplicationException;

/**
 * Model
 */
class PDBLiveProduct extends PDBProduct
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'sanofi_pdb_live_products';

    public $attachOne = [
        'img' => [
            'System\Models\File',
            'public' => true,
            'delete' => true
        ]
    ];

    public $belongsToMany = [
        'ingredients' => [
            '\Sanofi\Pdb\Models\PDBIngredient',
            'table'    => 'sanofi_pdb_live_product_x_ingredients',
            'key'      => 'product_id',
            'otherKey' => 'ingredient_id',
            'order' => 'name ASC',
        ]
    ];

    public $hasMany = [
        'Produktvariante' => [
            '\Sanofi\Pdb\Models\PDBLiveProductVariant',
            'table'    => 'sanofi_pdb_live_product_variants',
            'key'      => 'product_id',
            'otherKey' => 'id',
            'delete'   => true,
            'sortOrder' => 'sort_order',
        ]
    ];

    public $attachMany = [
        'images' => [
            'System\Models\File',
            'public' => true,
            'delete' => true
        ]
    ];

    public $jsonable = [
        // Only footnotes required as jsonable field (override definition of parent)
        'footnotes',
    ];

    // override base deletion as it only deletes a pendant of the Live Class (which is not required for itself)
    public function beforeDelete() { }

    public function publish()
    {
        // Do nothing - The method is not required for the published model version
    }
}
