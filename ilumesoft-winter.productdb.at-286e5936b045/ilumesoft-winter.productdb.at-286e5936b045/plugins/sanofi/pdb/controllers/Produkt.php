<?php namespace Sanofi\Pdb\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Illuminate\Support\Facades\Log;
use Sanofi\Pdb\Classes\PDBProductException;
use Sanofi\Pdb\Models\PDBLiveProduct;
use Sanofi\Pdb\Models\PDBLiveProductVariant;
use Sanofi\Pdb\Models\PDBProduct;
use Sanofi\Pdb\Models\PDBProductVariant;
use System\Models\File;
use Winter\Storm\Support\Facades\Flash;

class Produkt extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'sanofi.pdb.products'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Sanofi.Pdb', 'main-menu-item2');
        $this->addJs('/plugins/sanofi/pdb/assets/js/sortable.js');
        $this->addJs('/plugins/sanofi/pdb/assets/js/backend.js');
    }

    public function onPublishRequest()
    {
        $productId = post('productId') ?? false;

        if ($productId !== false) {
            if (($pdbRawProduct = PDBProduct::find($productId)) !== null) {
                try {
                    if ($pdbRawProduct->publish()) {
                        Flash::success('Die Produkteinstellungen von "' . $pdbRawProduct->name .'" wurden veröffentlicht');
                        return;
                    }
                } catch (PDBProductException $e) {
                    $errorMessage = $e->getMessage();

                    Flash::error($errorMessage);
                    return;
                }
            }
        }

        Flash::error('Ungültiges Produkt');
    }

    public function onReorderVariantRelation()
    {
        $records = request()->input('rcd');
        $model   = PDBProduct::findOrFail($this->params[0]);

        $model->setRelationOrder('Produktvariante', $records, range(1, count($records)));

        Flash::success(trans('sanofi.pdb::lang.general.sorted'));
    }
}
