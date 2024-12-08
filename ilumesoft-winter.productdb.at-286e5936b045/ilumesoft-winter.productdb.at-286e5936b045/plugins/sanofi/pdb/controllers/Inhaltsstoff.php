<?php namespace Sanofi\Pdb\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Inhaltsstoff extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'sanofi.pdb.ingredients'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Sanofi.Pdb', 'main-menu-item', 'side-menu-item2');
    }

    public function update_onSave($context = null)
    {
        parent::update_onSave($context);

        return redirect()->refresh();
    }
}
