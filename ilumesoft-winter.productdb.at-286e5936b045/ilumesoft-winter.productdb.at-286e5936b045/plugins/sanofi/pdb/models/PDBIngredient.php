<?php namespace Sanofi\Pdb\Models;

use Model;
use Sanofi\Pdb\Classes\PDBHelper;

/**
 * Model
 */
class PDBIngredient extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    public $belongsToMany = [
        'products' => [
            \Sanofi\Pdb\Models\PDBIngredient::class,
            'sanofi_pdb_product_x_ingredients',
            'key' => 'ingredient_id',
            'other_key' => 'id'
        ]
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sanofi_pdb_ingredients';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function beforeSave()
    {
        $this->name = PDBHelper::cleanupSubSupHtml($this->name);
    }
}
