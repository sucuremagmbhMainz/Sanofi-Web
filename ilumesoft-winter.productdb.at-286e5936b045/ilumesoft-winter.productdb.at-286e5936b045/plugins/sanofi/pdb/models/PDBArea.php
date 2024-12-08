<?php namespace Sanofi\Pdb\Models;

use Model;
use Sanofi\Pdb\Classes\PDBHelper;

/**
 * Model
 */
class PDBArea extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    public $hasMany = [
        'products' => [
            '\Sanofi\Pdb\Models\PDBProduct',
            'table'    => 'sanofi_pdb_products',
            'key'      => 'area_id',
            'otherKey' => 'id'
        ]
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sanofi_pdb_areas';

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
