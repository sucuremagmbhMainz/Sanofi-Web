<?php namespace RainLab\Pages\Classes;

use Backend\Facades\BackendAuth;
use Cms\Classes\Meta;
use DirectoryIterator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use RainLab\Pages\Classes\Page;

/**
 * The page list class reads and manages the static page hierarchy.
 *
 * @package rainlab\pages
 * @author Alexey Bobkov, Samuel Georges
 */
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

    /**
     * Returns a list of static pages in the specified theme.
     * This method is used internally by the system.
     * @param boolean $skipCache Indicates if objects should be reloaded from the disk bypassing the cache.
     * @return array Returns an array of static pages.
     */
    public function listPages($skipCache = false)
    {
        return Page::listInTheme($this->theme, $skipCache);
    }

    /**
     * Returns a list of top-level pages with subpages.
     * The method uses the theme's meta/static-pages.yaml file to build the hierarchy. The pages are returned
     * in the order defined in the YAML file. The result of the method is used for building the back-end UI
     * and for generating the menus.
     * @param boolean $skipCache Indicates if objects should be reloaded from the disk bypassing the cache.
     * @return array Returns a nested array of objects: object('page': $pageObj, 'subpages'=>[...])
     */
    public function getPageTree($skipCache = false)
    {
        $pages = $this->listPages($skipCache);
        $config = $this->getPagesConfig();

        // Make the $pages collection an associative array for performance
        $pagesArray = $pages->keyBy(function ($page) {
            return $page->getBaseFileName();
        })->all();

        $iterator = function($configPages) use (&$iterator, $pagesArray) {
            $result = [];

            foreach ($configPages as $fileName => $subpages) {
                if (isset($pagesArray[$fileName])) {
                    $result[] = (object) [
                        'page'     => $pagesArray[$fileName],
                        'subpages' => $iterator($subpages),
                    ];
                }
            }

            return $result;
        };

        return $iterator($config['static-pages']);
    }

    /**
     * Returns the parent name of the specified page.
     * @param \Cms\Classes\Page $page Specifies a page object.
     * @param string Returns the parent page name.
     */
    public function getPageParent($page)
    {
        $pagesConfig = $this->getPagesConfig();
        $requestedFileName = $page->getBaseFileName();

        $parent = null;

        $iterator = function($configPages) use (&$iterator, &$parent, $requestedFileName) {
            foreach ($configPages as $fileName => $subpages) {
                if ($fileName == $requestedFileName) {
                    return true;
                }

                if ($iterator($subpages) == true && is_null($parent)) {

                    $parent = $fileName;

                    return true;
                }
            }
        };

        $iterator($pagesConfig['static-pages']);

        return $parent;
    }

    /**
     * Returns a part of the page hierarchy starting from the specified page.
     * @param \Cms\Classes\Page $page Specifies a page object.
     * @param array Returns a nested array of page names.
     */
    public function getPageSubTree($page)
    {
        $pagesConfig = $this->getPagesConfig();
        $requestedFileName = $page->getBaseFileName();

        $subTree = [];

        $iterator = function($configPages) use (&$iterator, &$subTree, $requestedFileName) {
            if (is_array($configPages)) {
                foreach ($configPages as $fileName => $subpages) {
                    if ($fileName == $requestedFileName) {
                        $subTree = $subpages;

                        return true;
                    }

                    if ($iterator($subpages) === true) {
                        return true;
                    }
                }
            }
        };

        $iterator($pagesConfig['static-pages']);

        return $subTree;
    }

    /**
     * Appends page to the page hierarchy.
     * The page can be added to the end of the hierarchy or as a subpage to any existing page.
     */
    public function appendPage($page)
    {
        $this->refreshPageListCache();
    }

    /**
     * Removes a part of the page hierarchy starting from the specified page.
     * @param \Cms\Classes\Page $page Specifies a page object.
     */
    public function removeSubtree($page)
    {
        $this->refreshPageListCache();
    }

    /**
     * Returns the parsed meta/static-pages.yaml file contents.
     * @return mixed
     */
    public function getPagesConfig()
    {
        $pageListConfig = Cache::get('completePageList', []);

        if (empty($pageListConfig)) {
            $pageListConfig = $this->refreshPageListCache();
        }

        return $pageListConfig;
    }

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
