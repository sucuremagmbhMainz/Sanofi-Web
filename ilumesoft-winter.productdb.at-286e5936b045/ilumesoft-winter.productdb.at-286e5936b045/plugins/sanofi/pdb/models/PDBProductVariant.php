<?php namespace Sanofi\Pdb\Models;

use Illuminate\Support\Facades\Log;
use Model;
use October\Rain\Database\Traits\Sortable;
use Winter\Storm\Exception\ApplicationException;

/**
 * Model
 */
class PDBProductVariant extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sanofi_pdb_product_variants';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'raw_image' => 'required',
    ];

    public $jsonable = [
        'typesRaw',
        'raw_image'
    ];

    public $hasMany = [
        'variantTypes' => [
            '\Sanofi\Pdb\Models\PDBProductVariantType',
            'table'    => 'sanofi_pdb_product_variant_type',
            'key'      => 'variant_id',
            'otherKey' => 'id',
            'delete'   => true
        ]
    ];

    public $belongsTo = [
        'product' => [
            '\Sanofi\Pdb\Models\PDBProduct',
            'key' => 'id'
        ],
    ];

    public $attachOne = [
        'pdf_file_one' => [
            'System\Models\File',
            'public' => false,
            'delete' => true
        ],
        'pdf_file_two' => [
            'System\Models\File',
            'public' => false,
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
        'raw_image',
        'sort_order',
    ];

    public function afterFetch()
    {
        $typeEntries = [];
        foreach ($this->variantTypes as $type) {
            $typeEntries[] = [
                'pzn' => $type['pzn'],
                'amount' => $type['amount'],
            ];
        }

        // Setup typesRaw data to be visible in the repeater
        $this->typesRaw = $typeEntries;
    }

    private function storeTypesData()
    {
        // Delete existing Variant Types
        foreach ($this->variantTypes as $type) {
            $type->delete();
        }

        foreach ($this->tempTypesData as $typeEntry) {
            $variantType = new PDBProductVariantType();
            $variantType->variant_id = $this->id;
            $variantType->pzn = $typeEntry['pzn'];
            $variantType->amount = $typeEntry['amount'];

            $this->variantTypes()->add($variantType);
        }
    }

    public function afterCreate()
    {
        $this->storeTypesData();
    }

    public function afterSave()
    {
        $this->storeTypesData();
    }

    private $tempTypesData = [];

    private function ensureUniquePZNs()
    {
        $pznsToCheck = [];
        foreach ($this->tempTypesData as $type) {
            $pznsToCheck[] = $type['pzn'];
        }

        if (count(array_unique($pznsToCheck)) != count($pznsToCheck)) {
            throw new ApplicationException('Achtung ! Jede PZN darf nur einmal vergeben werden.');
        }

        foreach ($pznsToCheck as $pzn) {
            $typesWithPZN = PDBProductVariantType::where('pzn', $pzn)->get()->toArray();
            if (!empty($typesWithPZN)) {
                if (count($typesWithPZN) > 1) {
                    throw new ApplicationException('Achtung ! Jede PZN darf nur einmal vergeben werden.');
                } elseif (count($typesWithPZN) == 1 && $typesWithPZN[0]['variant_id'] != $this['id']) {
                    throw new ApplicationException('Achtung ! Jede PZN darf nur einmal vergeben werden.');
                }
            }
        }
    }

    public function beforeCreate()
    {
        $this->tempTypesData = $this->typesRaw;
        unset($this->typesRaw);

        $this->ensureUniquePZNs();
    }

    public function beforeUpdate()
    {
        $this->tempTypesData = $this->typesRaw;
        unset($this->typesRaw);

        $this->ensureUniquePZNs();
    }
}
