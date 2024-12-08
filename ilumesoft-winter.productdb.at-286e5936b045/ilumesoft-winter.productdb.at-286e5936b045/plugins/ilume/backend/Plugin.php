<?php namespace Ilume\Backend;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use Backend\Facades\BackendAuth;
use Backend\Models\UserGroup;
use Cms\Classes\Theme;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Ilume\Backend\Classes\PageManager;
use Ilume\Backend\Models\IlumBackRainlabPage;
use Ilume\Frontend\Classes\Helper;
use October\Rain\Exception\ApplicationException;
use RainLab\Pages\Classes\Page;
use RainLab\Pages\Classes\PageList;
use System\Classes\PluginBase;
use App;
use Event;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'Ilume Backend Additions',
            'description' => 'Provides features to the blockbased elements in the backend.',
            'author'      => 'Ilum:e',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        // Ensure, that we are currently in backend module.
        if (!App::runningInBackend()) {
            return;
        }

        // Listen for `backend.page.beforeDisplay` event and inject js to current controller instance.
        Event::listen('backend.page.beforeDisplay', function($controller, $action, $params) {
            // we only want to include our js if we're on the pages view
            if (get_class($controller) === "RainLab\Pages\Controllers\Index") {
                $controller->addJs('/plugins/ilume/backend/assets/js/ilume-backend.js');
                $controller->addCss('/plugins/ilume/backend/assets/css/ilume-backend.css');
                $controller->addCss('/themes/pdb-theme-at/assets/vendor/font-awesome/css/font-awesome.min.css');

                $controller->addJs('/ilume/dynamic-ilume-backend.js');
                $controller->addCss('/ilume/dynamic-ilume-backend.css');
            } else if (get_class($controller) === "Cms\Controllers\ThemeOptions") {
                $controller->addCss('/plugins/ilume/backend/assets/css/ilume-backend.css');
            }
        });


        Event::listen('backend.form.extendFields', function($formWidget) use (&$applyForFirstLayerOnly) {
            // Only for the CMS Index controller
            // in combination with the Page model
            if ($formWidget->getController() instanceof \RainLab\Pages\Controllers\Index &&
                $formWidget->model instanceof \RainLab\Pages\Classes\Page) {

                if (!key_exists('viewBag[url]', $formWidget->fields)) {
                    return;
                }

                /** ------- Ensure access restriction and proper disabling of the group access field for non creators ------- */
                $backendUser = BackendAuth::getUser();
                $ilumePageObj = IlumBackRainlabPage::getPageByRainlabRef($formWidget->model);

                $pageCreatorId = -1;
                $pageGrandAccessToGroups = '';
                if ($ilumePageObj) {
                    $pageCreatorId = $ilumePageObj->creator_id;
                    $pageGrandAccessToGroups = $ilumePageObj->grant_group_access_to;
                }

                $isUserPageOwner = $pageCreatorId == $backendUser->id;
                $isUserPageAdmin = PageManager::isPageAdmin($backendUser);

                foreach ($formWidget->getFields() as &$field) {
                    if ($field->fieldName == 'viewBag[groups_access_restriction]') {
                        if (!$isUserPageOwner && !$isUserPageAdmin) {
                            $field->disabled = true;
                        }

                        $field->cssClass = 'taglist restrict-usage taglist-only-for-' . $pageCreatorId;

                        // Fill the value of the group access with the value from the DB Obj
                        $field->value = $pageGrandAccessToGroups;
                    }
                }

                /** ------- Replace the toolbar with a custom one and add a new toolbar beside it ------- */
                $formWidget->removeField('toolbar');

                $formWidget->addFields([
                    'toolbar' => [
                        'type' => 'partial',
                        'path' => '~/themes/pdb-theme-at/partials/rainlab/pages/toolbars/_main_toolbar.htm',
                        'cssClass' => 'collapse-visible lastRowFormWidget',
                        'span' => 'left',
                    ]
                ]);
                $formWidget->addFields([
                    'toolbar2' => [
                        'type' => 'partial',
                        'path' => '~/themes/pdb-theme-at/partials/rainlab/pages/toolbars/_push_toolbar.htm',
                        'cssClass' => 'collapse-visible lastRowFormWidget',
                        'span' => 'right'
                    ]
                ]);

            }
        });

        $this->prepareRainlabPageBackendUserGroupOptions();

        $this->prepareRainlabPageListFiltering();

        $this->prepareRainlabPageViewBagFill();
    }

    /**
     * Prepares a RainlabPage Extension to provide a list of available backend user groups
     */
    private function prepareRainlabPageBackendUserGroupOptions() {

        // Prepare the product selection data for the productslider widget
        Page::extend(function ($model) {
            $model->addDynamicMethod('getGroupAccessOptions', function () {
                $backendUser = BackendAuth::getUser();
                $userGroups = $backendUser->groups;

                $backendUserGroups = UserGroup::all();

                $optionEntries = [];

                foreach ($backendUserGroups as $group) {
                    if ($group->code != 'owners') {
                        $optionEntries[$group->code] = $group->code;
                    }
                }

                return !empty($optionEntries) ? $optionEntries : ['no-groups-available' => '- No Groups found -'];
            });
        });
    }


    /**
     * Prepares a custom page list filtering (by userGroupId)
     */
    private function prepareRainlabPageListFiltering() {

        // UserGroupId Page List Filtering
//        Event::listen('rainlab.pages.list.filter', function (&$pages) {
//            $backendUser = BackendAuth::getUser();
//
//            $pageList = new PageList(Theme::getActiveTheme());
//            $allAvailablePages = $pageList->getPagesConfig();
//            $userSortEntries = PageList::fetchUserPageSort();
//
//            $pageRefsParsed = [];
//            $userSortFilterIterator = function ($sortEntries) use (&$userSortFilterIterator,  &$pageRefsParsed, $pages, $backendUser) {
//                $result = [];
//
//                foreach ($sortEntries as $refKey => $subPagesData) {
//                    if (PageManager::isPageConfigAccessibleByUser($refKey, $backendUser)) {
//                        // Find page bound to given refKey
//                        foreach ($pages as $page) {
//                            if ($page->page->getBaseFileName() == $refKey) {
//                                $pageRefsParsed[] = $refKey;
//
//                                $result[] = (object)[
//                                    'page' => $page->page,
//                                    'subpages' => $userSortFilterIterator($subPagesData, $pageRefsParsed, $pages, $backendUser)
//                                ];
//                            }
//                        }
//                    }
//                }
//
//                return $result;
//            };
//
//            // Collect the sorted entries, which are still available to the user
//            $userPages = $userSortFilterIterator($userSortEntries);
//
//            // Collect all other pages available to the user, which aren't stored in the sorted data
//            foreach ($pages as $page) {
//                if (PageManager::isPageConfigAccessibleByUser($page->page->getBaseFileName(), $backendUser) && !in_array($page->page->getBaseFileName(), $pageRefsParsed)) {
//                    $userPages[] = (object)[
//                        'page' => $page->page,
//                        'subpages' => []
//                    ];
//                }
//            }
//
//            $pages = $userPages;
//        });
    }

    /**
     * Prepares additional viewbag fill behaviour for the rainlab page class
     */
    private function prepareRainlabPageViewBagFill() {

        Event::listen('pages.object.save.fill.viewbag', function(&$viewBag) {
            $viewBag['layout'] = 'static-microsite';
        });

        // UserID Context Saving
        Event::listen('pages.object.save', function(&$controller, &$page, &$type) {
            $backendUser = BackendAuth::getUser();
            $viewBagArray = $page->viewBag;

            // Only applicable for normal pages (e.g. no special cases like menus)
            if ($type !== 'page') {
                return;
            }

            $revisionId = Request::input('revision_selection', 0);

            $pageRef = $page->getBaseFileName();

            $ilumePageObj = null;
            if (!PageManager::isPageConfigExisting($pageRef)) {
                $ilumePageObj = IlumBackRainlabPage::storePageConfig($pageRef, $backendUser->id);
            } else { //if (PageManager::isPageConfigAccessibleByUser($pageRef, $backendUser)) {
                $ilumePageObj = IlumBackRainlabPage::getPageByFileRef($pageRef);
            }

            if ($ilumePageObj !== null) {
                $ilumePageObj->current_revision_id = $revisionId;
                $currentPageRev = $ilumePageObj->getCurrentRevision();

                $currentPageRev->last_editor_id = $backendUser->id;
                $currentPageRev->save();

                // If the user is admin or the creator, add the setup group settings
                if (PageManager::isPageAdmin($backendUser) || ($ilumePageObj->creator_id == $backendUser->id)) {
                    $ilumePageObj->grant_group_access_to = isset($viewBagArray['groups_access_restriction']) ? $viewBagArray['groups_access_restriction'] : '';
                }

                $ilumePageObj->save();

                PageManager::storeCurrentPageRevision($pageRef);
            } else {
                Log::info('Denied Page Config Access (ID: ' . $backendUser->id . ' / TPL-File: ' . $page->fileName . ')');
                throw PageManager::pageAccessDeniedException();
            }
        });
    }

    public function registerFormWidgets()
    {
        return [
            'Ilume\Backend\FormWidgets\IlumeRepeater' => 'ilumerepeater'
        ];
    }
    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate
    }

    /**
     * Registers frontend-end markup tags for the twig engine
     *
     * @return array
     */
    public function registerMarkupTags()
    {
        return [];
    }
}
