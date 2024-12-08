PDB Theme (Last Version - 30.11.2021)
=======

# Project Informations

## A) Project Setup

### 1) PHP Settings
The allowed "max_input_vars" of your PHP Settings has to e set to ~5000 to allow bigger page setups in the project.
-> max_input_vars = 5000

### 2) Initial Content for Development / Testing
The creation of content is based on predefined blocks.
Each of the blocks provides its own html template and config yaml.

To initialize the local development further files can be found in the .development folder
> .development/.winter_pdb_at.sql => Contains the required db tables of the project (db name can be for example "winter_pdb_at") but has to be in the .env as well


### 3) Project Environment Setup
The .env File in the Root Folder has to be setup properly.
Depending on your Environment you will have to copy the .env.mamp or .env.docker file.

After copying, you can adjust the .env settings to your needs (e.g. like port and database name)


### 4) Page Initialization
# Important: This step is only required if page content files have been added manually to the static-pages folder

To make the page contents usable, the data has to be initialized and placed in the required folders / needs to be added to the appropriate db tables.
> Note: This happens automatically when creating new pages.

Open your project in the browser and call the following relative URL
> /backend/initiatePages/ignoreMissingMedia

### 5) Backend Login

The DEV Version of the project offers two different administrators

> 1.) The base administrator with access to everything
>
> user: admin
> pw: ilume

## B) General Development Info

### Custom Blocks

The usable blocks available in the backend for each page can be found under ".../themes/{THEME_NAME}/partials/blocks".
Every non-hidden subfolder in this parent folder contains the definition for one block.
Each block folder contains a proper "*.htm" and a "_config.yaml" file.

* *.htm File => The file defines the dynamic frontend template, which renders content and pre configured data from the backend
* _config.yaml File => The file contains the configurable information for the backend

### Custom Layouts
The project contains different layouts for different page sections.

Every layout is based on the partial "main-layout".

If you want to create a new layout, be aware of the following:

To properly parse the blocks and their configuration for the backend, the file must contain the following:

        <!-- Render blocks in the backend -->
        {repeater
            name="sections"
            tab="Blocks"
            blockSrcFolders="base, october.blocks.core"
            ignoreBlocks="xxx, yyy"}
                {# Throws error, if empty #}
        {/repeater}


To properly render blocks in the fronted, it must also contain the following:

        <!-- Render blocks in the frontend -->
        {% for section in sections %}
            {% partial 'blocks/' ~ section._group ~ '/' ~ section._group data=section %}
        {% endfor %}

## C) Important: When updating OctoberCMS
When updating OctoberCMS, some specific project changes have to be reapplied, as these couldn't be separated from the CMS Code

#### 1. Plugin Changes

#### Utopigs Seo
The Plugin contains some extension for the meta usage
1. The storing of the image has been moved from file to db (now only the path to a media image will be stored)
2. Some additional meta fields have been added (robots, canonical)
3. A filter for hidden pages has been added to the SEO Sitemap Generation

plugins/utopigs/seo/models/Sitemap.php

        protected static function staticPageResolveMenuItem($item, $theme)
        {
            ...

            elseif ($item->type == 'all-static-pages') {
                $pages = \RainLab\Pages\Classes\Page::all();

                if (empty($pages)) {
                    return;
                }

                foreach ($pages as $page) {
                    if (!array_key_exists('is_hidden', $page->viewBag) || $page->viewBag['is_hidden'] == '0') {
                        $result['items'][] = self::getStaticPageMenuItem($page);
                    }
                }

            ...
        }

#### 2. OctoberCMS Core Changes

##### Enabling HTML output for checkbox widgets
modules/backend/widgets/form/partials/_field_checkbox.htm

        ...
         <label for="<?= $field->getId() ?>">
            <?= $field->label ?>
         </label>
        ...

##### Enabling max length for textarea widgets
modules/backend/widgets/form/partials/_field_textarea.htm

        ...
        <textarea
            name="<?= $field->getName() ?>"
            id="<?= $field->getId() ?>"
            autocomplete="off"
            class="form-control field-textarea size-<?= $field->size ?>"
            placeholder="<?= e(trans($field->placeholder)) ?>"
            <?php if (isset($field->config['maxlength'])): ?>
             maxlength="<?= $field->config['maxlength'] ?>"
            <?php endif?>
            <?= $field->getAttributes() ?>><?= e($field->value) ?></textarea>
        ...

##### Extending the fieldparser to use allow the custom IlumeRepeater widget
vendor/october/rain/src/Parse/Syntax/FieldParser.php

        ...
        protected $registeredTags = [
            'text',
            'textarea',
            'richeditor',
            'markdown',
            'fileupload',
            'mediafinder',
            'dropdown',
            'colorpicker',
            'radio',
            'checkbox',
            'checkboxlist',
            'datepicker',
            'balloon-selector',
            'repeater',
            'ilumerepeater',
            'variable'
        ];
        ...

         public function getDefaultParams($fields = null)
         {
            ...
            if ($params['type'] === 'repeater' || $params['type'] === 'ilumerepeater') {

                ...

            }
            ...
         }

         ...

         protected function processRepeaterTags($template)
         {
            list($tags, $fields) = $this->processTags($template, ['repeater', 'ilumerepeater']);

            ...
         }

         ...

plugins/rainlab/pages/controllers/Index.php

    protected function addPageSyntaxFields($formWidget, $page)
    {
        ...

        foreach ($fields as $fieldCode => $fieldConfig) {
            ...

            if (($fieldConfig['type'] == 'repeater') || ($fieldConfig['type'] == 'ilumerepeater')) {

                ...

            }

            ...

            /*
             * Translation support
             */
            $translatableTypes = ['text', 'textarea', 'richeditor', 'repeater', 'ilumerepeater', 'markdown', 'mediafinder'];

            ...
        }
    }

modules/cms/models/ThemeData.php

    public function afterFetch()
    {
        ...

        /*
         * Repeater form fields store arrays and must be jsonable.
         */
        foreach ($this->getFormFields() as $id => $field) {

            ...

            if (($field['type'] === 'repeater') || ($field['type'] === 'ilumerepeater')) {

                ...

            }

            ...
        }

        ...
    }

modules/backend/formwidgets/repeater/assets/js/repeater.js

    ...
    Repeater.prototype.collapse = function($item) {
        ...
        // $('.repeater-item-collapsed-title', $item).text(this.getCollapseTitle($item));
    }
    ...


##### Override page field configuration with ilume specific settings
plugins/rainlab/pages/classes/page/fields.yaml

    # ===================================
    #  Field Definitions
    # ===================================

    fields:
        viewBag[title]:
            span: left
            label: rainlab.pages::lang.editor.title
            placeholder: rainlab.pages::lang.editor.new_title
            attributes:
                default-focus: 1

        viewBag[url]:
            span: right
            placeholder: /
            label: rainlab.pages::lang.editor.url
            preset:
                field: viewBag[title]
                type: url
                prefixInput: input[data-parent-url]

        toolbar:
            type: partial
            path: page_toolbar
            cssClass: collapse-visible

    tabs:
        cssClass: master-area
        fields:
            viewBag[layout]:
                tab: cms::lang.editor.settings
                label: rainlab.pages::lang.page.layout
                type: dropdown
                options: getLayoutOptions
                span: left
            viewBag[bg_colorpick_value]:
                tab: cms::lang.editor.settings
                span: right
                label: ilume.backend::lang.editor.bg_colorpick
                type: colorpicker
                availableColors: ["transparent", "#ffffff","#000000", "#5cb57e"]
                default: "transparent"

            viewBag[custom_css]:
                tab: Code / Analytics
                label: Custom CSS
                type: codeeditor
                size: huge
                language: css
            viewBag[custom_js]:
                tab: Code / Analytics
                label: Custom JS / Analytics
                type: codeeditor
                size: huge
                language: javascript

            viewBag[is_hidden]:
                tab: ilume.backend::lang.editor.security
                span: left
                label: "Verstecken"
                type: checkbox
                comment: rainlab.pages::lang.editor.hidden_comment
            viewBag[groups_access_restriction]:
                tab: ilume.backend::lang.editor.security
                label: ilume.backend::lang.editor.groups_access_restriction
                span: right
                type: taglist
                options:
                    getGroupAccessOptions
                customTags: false

### Custom Group Filtering for the configurable pages
The Rainlab Pages Plugin has been adjusted to enable template access restrictions by userGroupId and unique filename-creation based on the userGroup:

1.) **PATH:** plugins/rainlab/pages/widgets/Pagelist.php

>**Note:** An additional event firing to offer pagelist filtering before viewing it to the user.

    <?php namespace RainLab\Pages\Widgets;

    use Illuminate\Support\Facades\Event;
    ...

    function getData() {

        ...

        // Fires an event to offer pagelist filtering with custom code
        Event::fire('rainlab.pages.list.filter', [&$pages]);
        return $pages;
    }

    ...

2.) **PATH:** plugins/rainlab/pages/classes/Pagelist.php
    public function getPagesConfig() {
        ...
    }


3.) **PATH:** plugins/rainlab/pages/controllers/Index.php

>**Note:** An additional event firing to offer viewBag adjustment before filling the page object.

    protected function fillObjectFromPost($type)
    {
        ...

        if ($type == 'page') {
            $placeholders = array_get($saveData, 'placeholders');

            ...

            // Fires an event to offer enriching the viewbag with custom data, after filling it from post
            Event::fire('pages.object.save.fill.viewbag', [&$objectData['settings']['viewBag']]);
        }

        ...
    }

### Creator / Last Editor Info + Publishing
Added a new functionality to publish pages to a predefined PROD path (check .env*)

1.) **PATH:** plugins/rainlab/pages/controllers/Index.php

        ...

        /**
         * Dummy method to allow data-request usage to enable a proper loading indicator
         * @return int
         */
        public function onPush() {
            return 1;
        }

        public function onCreateObject()
        {
            ...

            $this->vars['canCommit'] = $this->canCommitObject($object);
            $this->vars['canReset'] = $this->canResetObject($object);

            ...
        }

        protected function pushObjectForm($type, $object, $alias = null)
        {
            ...

            $this->vars['canReset'] = $this->canResetObject($object);
            $this->vars['canPublish'] = true;

            ...

            $this->vars['lastModified'] = DateTime::makeCarbon($object->mtime);

            if ($object instanceof \RainLab\Pages\Classes\Page) {
                $this->vars['pageRef'] = $object->getBaseFileName();

                $pageDataObj = IlumBackRainlabPage::getPageByFileRef($object->getBaseFileName());
                if ($pageDataObj !== null) {
                    $creatorId = $pageDataObj->creator_id;
                    $lastEditorId = $pageDataObj->last_editor_id;

                    $creator = User::where('id', $creatorId)->first();
                    if ($creator !== null) {
                        $this->vars['creator'] = $creator->first_name . ' ' . $creator->last_name;
                    }

                    $lastEditor = User::where('id', $lastEditorId)->first();
                    if ($lastEditor !== null) {
                        $this->vars['lastEditor'] = $lastEditor->first_name . ' ' . $lastEditor->last_name;
                    }
                }
            }

            ...
        }

2.) **PATH:** modules/backed/layouts/default.htm

        ...

        <div class="layout">
            <script>
                function prepareExportToolbar(uniqueId) {
                    let contextActionHolder = document.querySelector('body');
                    let saveButton = document.querySelector('a[data-save-btn="' + uniqueId + '"]');

                    let pushToProdBtn = document.querySelector('a[data-push-prod-btn="' + uniqueId + '"]');

                    let toolbarTabPane = saveButton.closest('.tab-pane');

                    if (contextActionHolder && saveButton && toolbarTabPane) {
                        if (pushToProdBtn) {
                            prepareToolbarButton(toolbarTabPane, contextActionHolder, saveButton, pushToProdBtn, uniqueId);
                        }
                    }
                }

                function prepareToolbarButton(toolbarTabPane, contextActionHolder, saveButton , toolbarButton, uniqueId) {
                    toolbarButton.addEventListener('click', function(event) {
                        contextActionHolder.setAttribute('data-after-save-action-type', toolbarButton.getAttribute('data-toolbar-action'));
                        contextActionHolder.setAttribute('data-after-save-action', 'data-' + toolbarButton.getAttribute('data-toolbar-action') + '-btn=' + '"' + uniqueId + '"');

                        if (toolbarTabPane.hasAttribute('data-modified')) {
                            saveButton.click();
                        } else {
                            resolveToolbarAction();
                        }
                    });
                }

                function resolveToolbarAction() {
                    let pageBody = document.querySelector('body');
                    if (pageBody) {
                        let nextActionElementRef = pageBody.getAttribute('data-after-save-action');
                        if (nextActionElementRef) {
                            let nextActionElement = document.querySelector('[' + nextActionElementRef + ']');
                            pageBody.removeAttribute('data-after-save-action');

                            if (nextActionElement) {
                                let nextActionParentTab = nextActionElement.closest('.tab-pane');
                                let currentTab = document.querySelector('#pages-master-tabs > .tab-content > .tab-pane.active');

                                if (pageBody && nextActionParentTab && nextActionParentTab == currentTab) {
                                    let nextActionType = pageBody.getAttribute('data-after-save-action-type');
                                    let targetUrl = nextActionElement.getAttribute('data-target-url');

                                    if (targetUrl && targetUrl != '') {
                                        switch (nextActionType) {
                                            case 'push-prod':
                                            $.ajax({
                                                url: targetUrl,
                                                type: 'GET',
                                                success: function (responseData) {
                                                    var response;
                                                    try {
                                                        response = $.parseJSON(responseData);
                                                    } catch (e) {
                                                        $.oc.flashMsg({
                                                            'text': 'The system response couln\'t be parsed. => ' + responseData,
                                                            'class': 'error',
                                                            'interval': 6
                                                        });
                                                        return;
                                                    }

                                                    if (response.result === undefined ||
                                                        response.msg === undefined) {

                                                        $.oc.flashMsg({
                                                            'text': 'The system response couln\'t be parsed.',
                                                            'class': 'error',
                                                            'interval': 6
                                                        })
                                                        return;
                                                    } else {
                                                        $.oc.flashMsg({
                                                            'text': response.msg,
                                                            'class': response.result,
                                                            'interval': 6
                                                        })
                                                        return;
                                                    }
                                                },
                                                error: function (response) {
                                                    $.oc.flashMsg({
                                                        'text': 'The system didn\'t respond properly.',
                                                        'class': 'error',
                                                        'interval': 6
                                                    })
                                                    return;
                                                }
                                            });
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                $(document).on('ajaxSuccess', function(event, context, data) {
                    if (context.handler == 'onSave') {
                        resolveToolbarAction();
                    }
                });
            </script>

            ...
        </div>

        ...


3.) **PATH:** modules/backend/lang/de/lang.php

    ...

    'folder_name' => 'Ordnername (darf nicht mit einem _ beginnen !)',

    ...


4.) **PATH:** modules/backed/layouts/default.htm

    public function listFolderContents($folder = '/', $sortBy = 'title', $filter = null, $ignoreFolders = false)
    {

    ...

    $this->filterItemList($folderContents['files'], $filter);

    $folderContents['folders'] = array_filter($folderContents['folders'], function(MediaLibraryItem $element) {
        $folderPath = $element->path;
        $folderPathParts = explode('/', $folderPath);
        if (!empty($folderPathParts[count($folderPathParts) - 1]) && ($folderPathParts[count($folderPathParts) - 1][0] == '_')) {
            return false;
        } else {
            return true;
        }
    });

    ...

    public function makeFolder($path)
    {
        $path = self::validatePath($path);
        $pathParts = explode('/', $path);

        if (!empty($pathParts[count($pathParts) - 1]) && ($pathParts[count($pathParts) - 1][0] == '_')) {
            throw new ApplicationException('Der Verzeichnisname darf nicht mit einem _ beginnen !');
        }

        ...

    }


5.) **PATH:** plugins/rainlab/pages/assets/js/pages-page.js

    PagesPage.prototype.handleRevisionLoad = function (form) {
        var $form = $(form)

        $form.popup({ handler: 'onRevisionLoadRequestForm' })

        var popup = $form.data('oc.popup'),
            self = this

        $(popup.$container).on('click', 'button[data-action=overwrite]', function(){
            popup.hide()
            self.loadRevision($form)
        })

        $(popup.$container).on('click', 'button[data-action=dismiss]', function(){
            popup.hide()
        })
    }


    PagesPage.prototype.handleRevisionCreate = function (form) {
        var $form = $(form)

        $form.popup({ handler: 'onRevisionCreateRequestForm' })

        var popup = $form.data('oc.popup'),
            self = this

        $(popup.$container).on('click', 'button[data-action=create]', function(){
            self.createRevision($form, popup);
        })

        $(popup.$container).on('click', 'button[data-action=dismiss]', function(){
            popup.hide()
        })
    }

    PagesPage.prototype.loadRevision = function($form) {
        var data = {
                type: $('[name=objectType]', $form).val(),
                theme: $('[name=theme]', $form).val(),
                path: $('[name=objectPath]', $form).val(),
                revision_to_load: $('[name=revision_selection]', $form).val(),
            },
            tabId = data.type + '-' + data.theme + '-' + data.path,
            tab = this.masterTabsObj.findByIdentifier(tabId),
            self = this

        /*
         * Load revision and update tab
         */
        $.oc.stripeLoadIndicator.show()
        $form.request('onRevisionChange', {
            data: data
        }).done(function(data) {
            $.oc.stripeLoadIndicator.hide()

            var objectType = $('input[name=objectType]', $form).val();

            self.$masterTabs.ocTab('closeTab', tab, true);

            self.updateObjectList(objectType);

            $form.trigger('unchange.oc.changeMonitor');
        }).always(function(){
            $.oc.stripeLoadIndicator.hide()
        })
    }

    PagesPage.prototype.createRevision = function($form, popup) {

        let modalMailInput = document.querySelector('[name=revision_name]');
        if (modalMailInput === undefined || modalMailInput === null) {
            $.oc.flashMsg({
                'text': 'Missing input',
                'class': 'error',
                'interval': 6
            })
            return;
        }

        modalMailInput.value = (modalMailInput.value !== undefined) ? modalMailInput.value.replace('/[^a-zA-Z0-9\-]/', '') : '';

        if (modalMailInput.checkValidity() === false) {
            modalMailInput.reportValidity();
            return;
        }

        let revisionSelectbox = $('[data-control=rev-select]', $form);
        var reloadRevSelectDataFuncName = revisionSelectbox.data('reload-func');
        var reloadRevSelectFunc = window[reloadRevSelectDataFuncName];

        if (reloadRevSelectFunc === undefined) {
            $.oc.flashMsg({
                'text': 'Die neue Revision konnte leider nicht festgelegt werden.',
                'class': 'error',
                'interval': 6
            })
            return;
        }

        popup.hide()

        var data = {
            type: $('[name=objectType]', $form).val(),
            theme: $('[name=theme]', $form).val(),
            path: $('[name=objectPath]', $form).val(),
            revision_name: modalMailInput.value,
        };

        /*
         * Set new revision and save tab
         */
        $.oc.stripeLoadIndicator.show()
        $form.request('onRevisionCreate', {
            data: data
        }).done(function(data) {
            $.oc.stripeLoadIndicator.hide()

            $.oc.flashMsg({
                'text': 'Revision created',
                'class': 'success',
                'interval': 6
            })

            reloadRevSelectFunc(data.objectPath, function() {
                $('[data-control=rev-select]', $form).val($('[data-control=rev-select] > option', $form).last().val());

                $('[data-control=save-button]', $form).click();
            });

        }).always(function(){
            $.oc.stripeLoadIndicator.hide()
        })
    }

    /*
     * Reloads the Editor form.
     */

    ...

    /*
     * Handles AJAX errors in the master tab forms. Processes the mtime mismatch condition (concurrency).
     */
    PagesPage.prototype.onAjaxError = function(event, context, message, data, jqXHR) {
        if (context.handler != 'onSave' && context.handler != 'onRevisionLoadRequest' && context.handler != 'onRevisionCreateRequest')
            return

        if (jqXHR.responseText == 'mtime-mismatch') {
            event.preventDefault()
            this.handleMtimeMismatch(event.target)
        } else if (jqXHR.responseText == 'rev-load-confirm-modal') {
            event.preventDefault()
            this.handleRevisionLoad(event.target)
        } else if (jqXHR.responseText == 'rev-create-modal') {
            event.preventDefault()
            this.handleRevisionCreate(event.target)
        }
    }

    /*
     * Handles successful AJAX request in the master tab forms. Updates the UI elements and resets the mtime value.
     */
    PagesPage.prototype.onAjaxSuccess = function(event, context, data) {
        var $form = $(event.currentTarget),
            $tabPane = $form.closest('.tab-pane')

         // Update the visibilities of the commit & reset buttons
        $('[data-control=commit-button]', $form).toggleClass('hide', !data.canCommit)
        $('[data-control=reset-button]', $form).toggleClass('hide', !data.canReset)

        if (data.objectPath !== undefined) {
            $('input[name=objectPath]', $form).val(data.objectPath)
            $('input[name=objectMtime]', $form).val(data.objectMtime)
            $('[data-control=delete-button]', $form).removeClass('hide')
            $('[data-control=preview-button]', $form).removeClass('hide')
            $('[data-control=live-button]', $form).removeClass('hide')
            $('[data-control=push-toolbar]', $form).removeClass('hide')
            $('[data-control=publish-button]', $form).attr('data-target-url', '/publish/' + data.objectPath);

            var reloadRevSelectDataFuncName = $('[data-control=rev-select]', $form).data('reload-func');
            if (reloadRevSelectDataFuncName !== undefined) {
                var reloadRevSelectFunc = window[reloadRevSelectDataFuncName];
                if (reloadRevSelectFunc !== undefined) {
                    reloadRevSelectFunc(data.objectPath);
                }
            }

            if (data.pageUrl !== undefined) {
                $('[data-control=preview-button]', $form).attr('href', data.pageUrl + '?preview=1')
                $('[data-control=live-button]', $form).attr('href', data.pageUrl);
            }
        }

        ...

    }

    ...


### Page deletion cleanup, User defined sorting
Added additional functionality to cleanup revision folders / published data of pages
Added per user defined sorting

1.) **PATH:** plugins/rainlab/pages/classes/Page.php

    <?php namespace RainLab\Pages\Classes;

    use Backend\Facades\Backend;
    use Backend\Facades\BackendAuth;
    use Ilume\Backend\Classes\PageManager;

    ...

    class Page extends ContentBase
    {
        ...

        public function __construct(array $attributes = [])
        {
            $backendUser = BackendAuth::getUser();
            $backendUrl = Backend::url('rainlab');
            $backendUrl = substr($backendUrl, strpos($backendUrl, '/backend'));
            $requestUri = $_SERVER['REQUEST_URI'];

            $showPreview = isset($_GET['preview']);

            if ($backendUser !== null && (strpos($requestUri, $backendUrl) === 0 || $showPreview)) {
                $this->dirName = 'content/static-pages';
            } else {
                $this->dirName = 'content/static-published';
            }

            ...
        }

        ...

        public function delete()
        {

            ...

            $publishedPage = $this->theme->getPath('') . '/content/static-published/' . $this->getBaseFileName() . '.htm';
            $pubMediaPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/app/media/_pub_/testseite';
            $pageRevisionsPath = $this->theme->getPath('') . '/content/static-revisions/' . $this->getBaseFileName();
            $pageRevisionsPathCopy = $this->theme->getPath('') . '/content/static-revisions/_' . $this->getBaseFileName() . '_' . date("YmdHis");

            if (file_exists($publishedPage)) {
                unlink($publishedPage);
            }

            if (file_exists($pubMediaPath)) {
                PageManager::cleanFolder($pubMediaPath, false);
            }

            if (file_exists($pageRevisionsPath) && !file_exists($pageRevisionsPathCopy)) {
                mkdir($pageRevisionsPathCopy);
                PageManager::copyFolder($pageRevisionsPath, $pageRevisionsPathCopy, true);

                PageManager::cleanFolder($pageRevisionsPath, false);
            }

            parent::delete();

            /*
             * Remove from meta
             */
            $this->removeFromMeta();

            return $result;
        }

        ...
    }


2.) **PATH:** plugins/rainlab/pages/classes/PageList.php

     <?php namespace RainLab\Pages\Classes;

    use Backend\Facades\BackendAuth;
    use DirectoryIterator;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\DB;

    ...

    class PageList
    {
        protected $theme;

        /**
         * Creates the page list object.
         * @param \Cms\Classes\Theme $theme Specifies a parent theme.
         */
        public function __construct($theme)
        {
            $this->theme = $theme;
        }

        ...

        public function appendPage($page)
        {
            $this->refreshPageListCache();
        }

        public function removeSubtree($page)
        {
            $this->refreshPageListCache();
        }

        ...

        public function getPagesConfig()
        {
            Cache::forget('completePageList');
            $pageListConfig = Cache::get('completePageList', []);

            if (empty($pageListConfig)) {
                $pageListConfig = $this->refreshPageListCache();
            }

            return $pageListConfig;
        }

        ...

        /**
         * Updates the page hierarchy structure in the theme's meta/static-pages.yaml file.
         * @param array $structure A nested associative array representing the page structure
         */
        public function updateStructure($structure)
        {
            $this->storeUserPageSort($structure);
        }

        /**
         * Refreshes the basic page listing cache, which contains the references to all pages on a single layer
         *
         * @return array the configuration array containing the page list entries
         */
        private function refreshPageListCache()
        {
            $pagesRootFolder = $this->theme->getPath('') . '/content/static-pages/';

            $pageFiles = [];
            $dir = new DirectoryIterator($pagesRootFolder);
            foreach ($dir as $fileInfo) {
                if ($fileInfo->isFile()) {
                    $fileName = $fileInfo->getFilename();
                    $fileRef = explode('.', $fileName)[0];

                    if (!empty($fileRef) && preg_match('/^[a-zA-Z]/', $fileRef)) {
                        $pageFiles[] = $fileRef;
                    }
                }
            }

            sort($pageFiles);

            $sortedPageFiles = [];
            foreach ($pageFiles as $ref) {
                $sortedPageFiles[$ref] = [];
            }

            $pageListConfig = [
                'static-pages' => $sortedPageFiles
            ];

            Cache::forever('completePageList', $pageListConfig);

            return $pageListConfig;
        }

        /**
         * Fetches the stored user page sorting of the current user, if available
         *
         * @return array|mixed
         */
        public static function fetchUserPageSort()
        {
            $user = BackendAuth::getUser();

            if ($user !== null) {
                $userId = $user->id;

                $userSortEntries = DB::table('ilume_backend_rainlab_pages_user_sort')->where(
                    [
                        'user_id' => $userId,
                    ]
                )->first();

                return $userSortEntries ? json_decode($userSortEntries->sort_data ?? '') : [];
            }

            return [];
        }

        /**
         * Stores the given structure as user page sorting for the current user
         *
         * @param $structure
         */
        public function storeUserPageSort($structure)
        {
            $user = BackendAuth::getUser();

            if ($user !== null) {
                $userId = $user->id;

                DB::table('ilume_backend_rainlab_pages_user_sort')->updateOrInsert(
                    [
                        'user_id' => $userId,
                    ],
                    [
                        'sort_data' => json_encode($structure)
                    ]
                );
            }
        }
    }
