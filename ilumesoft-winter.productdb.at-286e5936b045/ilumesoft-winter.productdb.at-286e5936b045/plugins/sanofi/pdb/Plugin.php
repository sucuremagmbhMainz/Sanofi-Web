<?php namespace Sanofi\Pdb;

use Backend\Classes\WidgetBase;
use Backend\Widgets\Form;
use Backend\Widgets\Lists;
use Illuminate\Support\Facades\Event;
use Sanofi\Pdb\Models\PDBArea;
use Sanofi\Pdb\Models\PDBIngredient;
use Sanofi\Pdb\Models\PDBProduct;
use System\Classes\PluginBase;
use Winter\Storm\Exception\ApplicationException;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function registerListColumnTypes()
    {

        return [
            // A local method, i.e $this->evalUppercaseListColumn()
            'area_name' => [$this, 'evalProductAreaNameListColumn'],
        ];
    }


    public function evalProductAreaNameListColumn($value, $column, $record)
    {
        $current_property = PDBArea::where('id', $record->area_id)->first();
        return $current_property->name;

    }

    public function boot()
    {
        // Listen for `backend.page.beforeDisplay` event and inject js to current controller instance.
        Event::listen('backend.page.beforeDisplay', function ($controller, $action, $params) {

            // we only want to include our backend css if we're on the pages view
            if (preg_match('/^Sanofi\\\Pdb\\\Controllers\\\/', get_class($controller))) {
                $controller->addCss('/plugins/sanofi/pdb/assets/css/backend.css');
            }
        });

        // Extend the Lists Widget to apply some custom partial path (allows overriding)
        Lists::extend(function(WidgetBase $widget) {
            $widget->addViewPath(plugins_path('sanofi/pdb') . '/partial-overwrite/');
        });

        Form::extend(function($widget) {
            $widget->addViewPath(plugins_path('sanofi/pdb') . '/partial-overwrite/');
        });
    }
}
