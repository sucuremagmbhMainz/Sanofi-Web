<?php namespace Ilume\Backend\FormWidgets;

use Cms\Classes\Theme;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Lang;
use October\Rain\Exception\ApplicationException;
use Backend\Classes\FormWidgetBase;

/**
 * Repeater Form Widget
 */
class IlumeRepeater extends FormWidgetBase
{
    //
    // Configurable properties
    //

    /**
     * @var array used for caching config-data
     */
    private static $cachedGroupConfig = array();

    public const BLOCKS_PATHS_CACHE_KEY = '_BLOCKS_PATH_STR_CACHE_';

    /**
     * @var array Form field configuration
     */
    public $form;

    /**
     * @var string Prompt text for adding new items.
     */
    public $prompt;

    /**
     * @var bool Items can be sorted.
     */
    public $sortable = false;

    /**
     * @var string Field name to use for the title of collapsed items
     */
    public $titleFrom = false;

    /**
     * @var int Minimum items required. Pre-displays those items when not using groups
     */
    public $minItems;

    /**
     * @var int Maximum items permitted
     */
    public $maxItems;

    /**
     * @var string The style of the repeater. Can be one of three values:
     *  - "default": Shows all repeater items expanded on load.
     *  - "collapsed": Shows all repeater items collapsed on load.
     *  - "accordion": Shows only the first repeater item expanded on load. When another item is clicked, all other open
     *      items are collapsed.
     */
    public $style;

    //
    // Object properties
    //

    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'ilumerepeater';

    /**
     * @var array Meta data associated to each field, organised by index
     */
    protected $indexMeta = [];

    /**
     * @var array Collection of form widgets.
     */
    protected $formWidgets = [];

    /**
     * @var bool Stops nested repeaters populating from previous sibling.
     */
    protected static $onAddItemCalled = false;

    /**
     * Determines if a child repeater has made an AJAX request to add an item
     *
     * @var bool
     */
    protected $childAddItemCalled = false;

    /**
     * Determines which child index has made the AJAX request to add an item
     *
     * @var int
     */
    protected $childIndexCalled;

    protected $useGroups = false;

    protected $groupDefinitions = [];

    /**
     * Determines if repeater has been initialised previously
     *
     * @var boolean
     */
    protected $loaded = false;

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->prompt = Lang::get('ilume.backend::lang.repeater.add_new_item');

        $this->fillFromConfig([
            'form',
            'style',
            'prompt',
            'sortable',
            'titleFrom',
            'minItems',
            'maxItems',
        ]);

        if ($this->formField->disabled) {
            $this->previewMode = true;
        }

        // Check for loaded flag in POST
        if ((bool) post($this->alias . '_loaded') === true) {
            $this->loaded = true;
        }

        $this->checkAddItemRequest();
        $this->processGroupMode();

        if (!self::$onAddItemCalled) {
            $this->processItems();
        }
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('ilumerepeater');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        // Refresh the loaded data to support being modified by filterFields
        // @see https://github.com/octobercms/october/issues/2613
        if (!self::$onAddItemCalled) {
            $this->processItems();
        }

        if ($this->previewMode) {
            foreach ($this->formWidgets as $widget) {
                $widget->previewMode = true;
            }
        }

        $this->vars['prompt'] = $this->prompt;
        $this->vars['formWidgets'] = $this->formWidgets;
        $this->vars['titleFrom'] = $this->titleFrom;
        $this->vars['minItems'] = $this->minItems;
        $this->vars['maxItems'] = $this->maxItems;
        $this->vars['style'] = $this->style;

        $this->vars['useGroups'] = $this->useGroups;
        $this->vars['groupDefinitions'] = $this->groupDefinitions;
    }

    /**
     * @inheritDoc
     */
    protected function loadAssets()
    {
        $this->addCss('css/ilumerepeater.css', 'core');
        $this->addJs('js/ilumerepeater.js', 'core');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return (array) $this->processSaveValue($value);
    }

    /**
     * Splices in some meta data (group and index values) to the dataset.
     * @param array $value
     * @return array
     */
    protected function processSaveValue($value)
    {
        if (!is_array($value) || !$value) {
            return $value;
        }

        if ($this->minItems && count($value) < $this->minItems) {
            throw new ApplicationException(Lang::get('ilume.backend::lang.repeater.min_items_failed', ['name' => $this->fieldName, 'min' => $this->minItems, 'items' => count($value)]));
        }
        if ($this->maxItems && count($value) > $this->maxItems) {
            throw new ApplicationException(Lang::get('ilume.backend::lang.repeater.max_items_failed', ['name' => $this->fieldName, 'max' => $this->maxItems, 'items' => count($value)]));
        }

        /*
         * Give repeated form field widgets an opportunity to process the data.
         */
        foreach ($value as $index => $data) {
            if (isset($this->formWidgets[$index])) {
                if ($this->useGroups) {
                    $value[$index] = array_merge($this->formWidgets[$index]->getSaveData(), ['_group' => $data['_group']]);
                } else {
                    $value[$index] = $this->formWidgets[$index]->getSaveData();
                }
            }
        }

        return array_values($value);
    }

    /**
     * Processes form data and applies it to the form widgets.
     * @return void
     */
    protected function processItems()
    {
        $currentValue = ($this->loaded === true)
            ? post($this->formField->getName())
            : $this->getLoadValue();

        // Detect when a child widget is trying to run an AJAX handler
        // outside of the form element that contains all the repeater
        // fields that would normally be used to identify that case
        $handler = $this->controller->getAjaxHandler();
        if (!$this->loaded && starts_with($handler, $this->alias . 'Form')) {
            // Attempt to get the index of the repeater
            $handler = str_after($handler, $this->alias . 'Form');
            preg_match("~^(\d+)~", $handler, $matches);

            if (isset($matches[1])) {
                $index = $matches[1];
                $this->makeItemFormWidget($index);
            }
        }

        if (!$this->childAddItemCalled && $currentValue === null) {
            $this->formWidgets = [];
            return;
        }

        if ($this->childAddItemCalled && !isset($currentValue[$this->childIndexCalled])) {
            // If no value is available but a child repeater has added an item, add a "stub" repeater item
            $this->makeItemFormWidget($this->childIndexCalled);
        }

        // Ensure that the minimum number of items are preinitialized
        // ONLY DONE WHEN NOT IN GROUP MODE
        if (!$this->useGroups && $this->minItems > 0) {
            if (!is_array($currentValue)) {
                $currentValue = [];
                for ($i = 0; $i < $this->minItems; $i++) {
                    $currentValue[$i] = [];
                }
            } elseif (count($currentValue) < $this->minItems) {
                for ($i = 0; $i < ($this->minItems - count($currentValue)); $i++) {
                    $currentValue[] = [];
                }
            }
        }

        if (!is_array($currentValue)) {
            return;
        }

        collect($currentValue)->each(function ($value, $index) {
            $this->makeItemFormWidget($index, array_get($value, '_group', null));
        });
    }

    /**
     * Creates a form widget based on a field index and optional group code.
     * @param int $index
     * @param string $index
     * @return \Backend\Widgets\Form
     */
    protected function makeItemFormWidget($index = 0, $groupCode = null)
    {
        $configDefinition = $this->useGroups
            ? $this->getGroupFormFieldConfig($groupCode)
            : $this->form;

        $config = $this->makeConfig($configDefinition);
        $config->model = $this->model;
        $config->data = $this->getValueFromIndex($index);
        $config->alias = $this->alias . 'Form' . $index;
        $config->arrayName = $this->getFieldName().'['.$index.']';
        $config->isNested = true;
        if (self::$onAddItemCalled || $this->minItems > 0) {
            $config->enableDefaults = true;
        }

        $widget = $this->makeWidget('Backend\Widgets\Form', $config);
        $widget->previewMode = $this->previewMode;
        $widget->bindToController();

        $this->indexMeta[$index] = [
            'groupCode' => $groupCode
        ];

        return $this->formWidgets[$index] = $widget;
    }

    /**
     * Returns the data at a given index.
     * @param int $index
     */
    protected function getValueFromIndex($index)
    {
        $value = ($this->loaded === true)
            ? post($this->formField->getName())
            : $this->getLoadValue();

        if (!is_array($value)) {
            $value = [];
        }

        return array_get($value, $index, []);
    }

    //
    // AJAX handlers
    //

    public function onAddItem()
    {
        $groupCode = post('_repeater_group');

        $index = $this->getNextIndex();

        $this->prepareVars();
        $this->vars['widget'] = $this->makeItemFormWidget($index, $groupCode);
        $this->vars['indexValue'] = $index;

        $itemContainer = '@#' . $this->getId('items');

        return [
            $itemContainer => $this->makePartial('ilumerepeater_item')
        ];
    }

    public function onRemoveItem()
    {
        // Useful for deleting relations
    }

    public function onRefresh()
    {
        $index = post('_repeater_index');
        $group = post('_repeater_group');

        $widget = $this->makeItemFormWidget($index, $group);

        return $widget->onRefresh();
    }

    /**
     * Determines the next available index number for assigning to a new repeater item.
     *
     * @return int
     */
    protected function getNextIndex()
    {
        if ($this->loaded === true) {
            $data = post($this->formField->getName());

            if (is_array($data) && count($data)) {
                return (max(array_keys($data)) + 1);
            }
        } else {
            $data = $this->getLoadValue();

            if (is_array($data)) {
                return count($data);
            }
        }

        return 0;
    }

    /**
     * Determines the repeater that has triggered an AJAX request to add an item.
     *
     * @return void
     */
    protected function checkAddItemRequest()
    {
        $handler = $this->getParentForm()
            ->getController()
            ->getAjaxHandler();

        if ($handler === null || strpos($handler, '::') === false) {
            return;
        }

        list($widgetName, $handlerName) = explode('::', $handler);
        if ($handlerName !== 'onAddItem') {
            return;
        }

        if ($this->alias === $widgetName) {
            // This repeater has made the AJAX request
            self::$onAddItemCalled = true;
        } else if (strpos($widgetName, $this->alias . 'Form') === 0) {
            // A child repeater has made the AJAX request

            // Get index from AJAX handler
            $handlerSuffix = str_replace($this->alias . 'Form', '', $widgetName);
            if (preg_match('/^[0-9]+/', $handlerSuffix, $matches)) {
                $this->childAddItemCalled = true;
                $this->childIndexCalled = (int) $matches[0];
            }
        }
    }

    //
    // Group mode
    //

    /**
     * Returns the form field configuration for a group, identified by code.
     * @param string $code
     * @return array|null
     */
    protected function getGroupFormFieldConfig($code)
    {
        if (!$code) {
            return null;
        }

        $fields = array_get($this->groupDefinitions, $code.'.fields');

        if (!$fields) {
            return null;
        }

        return ['fields' => $fields, 'enableDefaults' => object_get($this->config, 'enableDefaults')];
    }

    /**
     * Process additional fields related to group mode.
     * @return array
     */
    protected function prepareSubGroupFieldAdditions()
    {
        if (!$additionalGroupFields = $this->getConfig('additional-group-fields', [], true)) {
            return [
                'prepend' => [],
                'append' => []
            ];
        }

        return [
            'prepend' => (isset($additionalGroupFields['prepend']) && $additionalGroupFields['prepend'] != null) ? $additionalGroupFields['prepend'] : [],
            'append' => (isset($additionalGroupFields['append']) && $additionalGroupFields['append'] != null) ? $additionalGroupFields['append'] : []
        ];
    }

    /**
     * Process the given path, searches for sub groups (e.g. sub blocks) and returns them appended to the optional parameter $currentGroupStr
     * @param $folderSearchPath string represents the folder, which should be parsed and searched through
     * @param $ignoreBlockEntries array an array containing block names, which should be ignored while searching
     * @return array
     */
    protected function getSubBlocks($folderSearchPath, array &$ignoreBlockEntries = array()) {
        $currentGroups = [];
        $blockFolderNames = scandir($folderSearchPath);

        foreach ($blockFolderNames as $blockName) {
            if (!in_array($blockName, $ignoreBlockEntries)) {
                $subGroupFolderPath = $folderSearchPath . '/' . $blockName;
                $possibleConfigPath = $subGroupFolderPath . '/_config.yaml';
                if (is_dir($subGroupFolderPath) && $blockName != '.' && $blockName != '..' && ($blockName[0] != '#' && ($blockName[0] != '_'))) {
                    if (file_exists($possibleConfigPath)) {
                        $ignoreBlockEntries[] = $blockName;
                        $currentGroups[] = $possibleConfigPath;
                    } else {
                        $currentGroups = array_merge($currentGroups, $this->getSubBlocks($subGroupFolderPath, $ignoreBlockEntries));
                    }
                }
            }
        }

        return $currentGroups;
    }

    /**
     * Generates a config array containing definitions, which should pre- & appended to every block
     *
     * @param $basicBlockFolderPath
     * @return array[]
     * @throws ApplicationException
     */
    protected function prepareBlockConfigExtensions($basicBlockFolderPath) {
        if (empty($basicBlockFolderPath)) {
            throw new ApplicationException("Missing basicBlockFolderPath to prepare Block Config Extensions");
        }

        $blockConfigPreExtFile = $basicBlockFolderPath . '_extensions/general/_block_prefix_config.yaml';
        $blockConfigPostExtFile = $basicBlockFolderPath . '_extensions/general/_block_postfix_config.yaml';

        $blockFieldExt = [
            'pre' => [],
            'post' => []
        ];
        // Prepare the Pre Post Config, if the appropriate config file exists
        if (file_exists($blockConfigPreExtFile) &&
            $config = $this->makeConfig($blockConfigPreExtFile, [])) {
            foreach ($config as $configKey => $configValue) {
                $blockFieldExt['pre'][$configKey] = $configValue;
            }
        }
        // Prepare the Block Post Config, if the appropriate config file exists
        if (file_exists($blockConfigPostExtFile) &&
            $config = $this->makeConfig($blockConfigPostExtFile, [])) {
            foreach ($config as $configKey => $configValue) {
                $blockFieldExt['post'][$configKey] = $configValue;
            }
        }

        return $blockFieldExt;
    }

    private static $ignoreBlockEntries = [];

    /**
     * Process features related to group mode.
     * @return void
     * @throws ApplicationException
     */
    protected function processGroupMode()
    {
        $palette = [];

        $blocks = [];
        // Stores all entries parsed (denies unwanted repetition of already parsed block keys)
        $parsedBlocks = [];

        $basicBlockFolder = themes_path(Theme::getActiveThemeCode()) . '/partials/blocks/';

        $blockFieldConfigExt = $this->prepareBlockConfigExtensions($basicBlockFolder);

        if ($ignoreBlockStr = $this->getConfig('ignoreBlocks', [])) {
            IlumeRepeater::$ignoreBlockEntries = array_map('trim', explode(',', $ignoreBlockStr));
            $parsedBlocks = array_merge($parsedBlocks, IlumeRepeater::$ignoreBlockEntries);
        }

        // If this is a repeater on the layout layer (first iteration), there should be a definition for the parsable block folders
        $group = false;
        $isSubGroupRepeater = false;
        $foldersKey = 'blockSrcFolders';
        if ($blockFoldersStr = $this->getConfig($foldersKey, false)) {
            $blockFolderList = array_map('trim', explode(',', $blockFoldersStr));

            foreach ($blockFolderList as $blockFolderName) {
                $blockFolderPath = $basicBlockFolder . $blockFolderName;

                $blocks = array_merge($blocks, $this->getSubBlocks($blockFolderPath,$parsedBlocks));
            }

            $group = implode(',', $blocks);
        } else {
            if ($group = $this->getConfig('groups', false)) {
                // This repeater is an in-block repeater, so we have to check if there should be additional sub groups embedded for this project
                $isSubGroupRepeater = true;
            }
        }

        // if we haven't any further groups stop the process and return with "no groups usage"
        if (!$group) {
            $this->useGroups = false;
            return;
        }

        // Fetch sub group field additions, if this is a block who defines extra fields for the sub group
        $additionalGroupFields = $this->prepareSubGroupFieldAdditions();

        if (is_string($group)) {
            $groupData = [];
            $groupEntries = [];

            $rawGroupEntries = array_map('trim', explode(',', $group));

            if ($isSubGroupRepeater) {
                // Split array by config file paths and dynamic extension entries
                foreach ($rawGroupEntries as $rawEntry) {
                    if (strlen($rawEntry) > 0) {
                        $rawGroupPathParts = explode('/', $rawEntry);

                        if (count($rawGroupPathParts) >= 2) {
                            $groupKey = $rawGroupPathParts[count($rawGroupPathParts) - 2];

                            if (!in_array($groupKey, IlumeRepeater::$ignoreBlockEntries)) {
                                $configFilePath = $basicBlockFolder . substr($rawEntry, 1);
                                $relativeConfigFilePath = '$/..' . substr($configFilePath, strpos($configFilePath, '/themes'));

                                // project specific group extension entry
                                if (strpos($rawEntry, '_extensions') != false) {

                                    if (file_exists($configFilePath)) {
                                        if (array_key_exists($configFilePath, IlumeRepeater::$cachedGroupConfig)) {
                                            $extConfigData = IlumeRepeater::$cachedGroupConfig[$configFilePath];
                                        } else {
                                            $extConfigData = $this->makeConfig($relativeConfigFilePath);
                                            IlumeRepeater::$cachedGroupConfig[$configFilePath] = $extConfigData;
                                        }

                                        if ($tmpAddGroupsStr = $extConfigData->groups) {
                                            $tmpAddGroupsStr = trim($tmpAddGroupsStr, " \t\n\r\0\x0B,");
                                            $projectSpecificGroupEntries = array_map(function ($subConfigElementFilePath) use ($basicBlockFolder) {
                                                $rawSubConfigElementFilePath = trim($subConfigElementFilePath);

                                                $subConfigElementFilePath = $basicBlockFolder . substr($rawSubConfigElementFilePath, 1);
                                                $subConfigElementFilePath = '$/..' . substr($subConfigElementFilePath, strpos($subConfigElementFilePath, '/themes'));

                                                return $subConfigElementFilePath;

                                            }, explode(',', $tmpAddGroupsStr));
                                            $groupEntries = array_merge($groupEntries, $projectSpecificGroupEntries);
                                        }
                                    }
                                    // normal group entry
                                } else {
                                    $groupEntries[] = $relativeConfigFilePath;
                                }
                            }
                        }
                    }
                }
            } else {
                $groupEntries = $rawGroupEntries;
            }

            foreach ($groupEntries as $entry) {
                if (array_key_exists($entry, IlumeRepeater::$cachedGroupConfig)) {
                    $entryData = IlumeRepeater::$cachedGroupConfig[$entry];
                } else {
                    $entryData = $this->makeConfig($entry);
                    IlumeRepeater::$cachedGroupConfig[$entry] = $entryData;
                }

                foreach ($entryData as $code => $config) {
                    $groupData[$code] = $config;
                }
            }

            $group = $groupData;
        }

        foreach ($group as $code => $config) {
            $palette[$code] = [
                'code' => $code,
                'name' => array_get($config, 'name'),
                'icon' => array_get($config, 'icon', 'icon-square-o'),
                'description' => array_get($config, 'description'),
                'fields' => [
                    'section_block_head' => [
                        'type' => 'section',
                        'label' => array_get($config, 'name'),
                        'icon' => array_get($config, 'icon', 'icon-square-o'),
                        'span' => 'left',
                        'containerAttributes' => [
                            'data-icon' => array_get($config, 'icon', 'icon-square-o'),
                        ]
                    ],
                    'section_block_id' => [
                        'label' => 'Page Anchor (HTML ID)',
                        'type' => 'text',
                        'span' => 'right',
                    ]
                ]
            ];

            // Custom prepend for sub blocks (defined per parent block)
            if (!empty($additionalGroupFields['prepend']))
                $palette[$code]['fields'] = $palette[$code]['fields'] + array_get($additionalGroupFields, 'prepend');

            // Prepare wrapper field elements, which have to be pre-/appended to blocks (defined in project blocks main folder)
            if (!empty($blockFieldConfigExt['pre'])) {
                $palette[$code]['fields'] = $palette[$code]['fields'] + $blockFieldConfigExt['pre'];
            }

            $palette[$code]['fields'] += array_get($config, 'fields', []);

            if (!empty($blockFieldConfigExt['post'])) {
                $palette[$code]['fields'] = $palette[$code]['fields'] + $blockFieldConfigExt['post'];
            }

            // Custom append for sub blocks (defined per parent block)
            if (!empty($additionalGroupFields['append']))
                $palette[$code]['fields'] = $palette[$code]['fields'] + array_get($additionalGroupFields, 'append');
        }

        $this->groupDefinitions = $palette;
        $this->useGroups = true;
    }

    /**
     * Returns a field group code from its index.
     * @param $index int
     * @return string
     */
    public function getGroupCodeFromIndex($index)
    {
        return array_get($this->indexMeta, $index.'.groupCode');
    }

    /**
     * Returns the group title from its unique code.
     * @param $groupCode string
     * @return string
     */
    public function getGroupTitle($groupCode)
    {
        return array_get($this->groupDefinitions, $groupCode.'.name');
    }
}
