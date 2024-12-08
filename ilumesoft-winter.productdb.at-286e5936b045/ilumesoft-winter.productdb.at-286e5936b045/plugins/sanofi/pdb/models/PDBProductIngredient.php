<?php namespace Sanofi\Pdb\Models;

use Model;

/**
 * Model
 */
class PDBProductIngredient extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sanofi_pdb_product_x_ingredients';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
