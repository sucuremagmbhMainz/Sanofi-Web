<?php namespace Ilume\Backend\Classes;

use Backend\Facades\BackendAuth;
use Backend\Models\User;
use Cms\Classes\Theme;
use Ilume\Backend\Models\IlumBackRainlabPage;
use October\Rain\Exception\ApplicationException;
use RainLab\Pages\Classes\Page;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class PageManager {

    /**
     * Cleans the given directory recursively, first by files, then by folders
     * @param $path
     * @throws PageManagerException
     */
    public static function cleanFolder($path, $cleanContentsOnly = true) {
        $serverRoot = $_SERVER['DOCUMENT_ROOT'];

        if (empty($serverRoot) || strlen($serverRoot) < 8) {
            throw new PageManagerException('Missing Server Root Path Definition / Base Length');
        }

        if (strpos($path, $serverRoot) === false) {
            throw new PageManagerException('Folder Cleanup denied !!');
        }

        $tmpFiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::LEAVES_ONLY);
        $files = [];
        $folders = [];

        foreach ($tmpFiles as $name => $file) {
            $filePath = $file->getRealPath();

            if ($file->isDir() && !in_array($filePath, $folders) && strpos($filePath, $path) !== false && ($path != $filePath || !$cleanContentsOnly)) {
                $folders[] = $filePath;
            } elseif (!$file->isDir() && !in_array($filePath, $files)) {
                $files[] = $filePath;
            }
        }

        // Resort folders by their depth
        usort($folders, function($entryA, $entryB) {
            return substr_count($entryA, '/') < substr_count($entryB, '/');
        });

        $files = array_reverse($files);
        foreach ($files as $fileEntry) {
            unlink($fileEntry);
        }

        foreach ($folders as $folderEntry) {
            rmdir($folderEntry);
        }
    }

    /**
     * @param $srcFolderPath
     * @param $tarRootFolderPath
     * @param bool $copyOnlyContents
     * @throws PageManagerException
     */
    public static function copyFolder($srcFolderPath, $tarRootFolderPath, $copyOnlyContents = false) {

        $serverRoot = $_SERVER['DOCUMENT_ROOT'];

        $srcPathParts = explode('/', $srcFolderPath);
        $baseSrcFolderName = $srcPathParts[count($srcPathParts) - 1];

        if (empty($serverRoot) || strlen($serverRoot) < 8) {
            throw new PageManagerException('Missing Server Root Path Definition / Base Length');
        }

        if (strpos($srcFolderPath, $serverRoot) === false || strpos($tarRootFolderPath, $serverRoot) === false) {
            throw new PageManagerException('Folder Copy denied !!');
        }

        $srcFiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($srcFolderPath), RecursiveIteratorIterator::LEAVES_ONLY);

        foreach ($srcFiles as $name => $file) {
            $srcFilePath = $file->getRealPath();

            if (!$file->isDir()) {
                $relativeFilePath = substr($srcFilePath, strlen($srcFolderPath) - 1);
                $targetFilePath = $tarRootFolderPath . $relativeFilePath;

                if (!$copyOnlyContents) {
                    $targetFilePath = $tarRootFolderPath . $baseSrcFolderName . '/' . $relativeFilePath;
                }

                $targetPathParts = explode('/', $targetFilePath);
                array_pop($targetPathParts);
                $targetFolderPath = implode('/', $targetPathParts);

                if (!file_exists($targetFolderPath)) {
                    mkdir($targetFolderPath, 0777, true);
                }

                copy($srcFilePath, $targetFilePath);
            }
        }
    }

    /**
     * @return string
     * @throws \ApplicationException
     */
    private static function getPageConfigCacheRootPath() {
        $activeTheme = Theme::getActiveTheme();
        return $activeTheme->getPath($activeTheme->getDirName() . '/content/static-pages/cache/');
    }

    /**
     * @param $pageRef
     * @return string
     * @throws \ApplicationException
     */
    private static function getPageConfigCacheFilePath($pageRef) {
        return self::getPageConfigCacheRootPath() . $pageRef . '.pagecache';
    }

    /**
     * @return mixed
     */
    public static function isPageConfigCachingEnabled() {
        return env('CMS_PRECACHE_PAGE_CONFIGS', false);
    }

    /**
     * @param $pageRef
     * @return bool
     * @throws \ApplicationException
     */
    public static function hasPageConfigCacheData($pageRef) {
        return file_exists(self::getPageConfigCacheFilePath($pageRef));
    }

    /**
     * @param $pageRef
     * @return false|mixed
     * @throws \ApplicationException
     */
    public static function fetchPageConfigCache($pageRef) {
        if (self::isPageConfigCachingEnabled() && self::hasPageConfigCacheData($pageRef)) {
            return unserialize(file_get_contents(self::getPageConfigCacheFilePath($pageRef)));
        }

        return false;
    }

    /**
     * @param $pageRef
     * @param $pageConfigData
     * @throws \ApplicationException
     */
    public static function storePageConfigCache($pageRef, $pageConfigData) {
        self::deletePageConfigCache($pageRef);

        if (self::isPageConfigCachingEnabled()) {
            file_put_contents(self::getPageConfigCacheFilePath($pageRef), serialize($pageConfigData));
        }
    }

    /**
     * @param $pageRef
     * @throws \ApplicationException
     */
    public static function deletePageConfigCache($pageRef) {
        $pageConfigCacheFilePath = self::getPageConfigCacheFilePath($pageRef);
        if (file_exists($pageConfigCacheFilePath)) {
            unlink($pageConfigCacheFilePath);
        }
    }

    /**
     * @param $pageRef
     * @param $pageRevId
     * @throws PageManagerException
     * @throws \ApplicationException
     */
    public static function loadPageRevision($pageRef, $pageRevId) {

        $pageRevisionRootPath = $_SERVER['DOCUMENT_ROOT'] . '/themes/' . Theme::getActiveTheme()->getDirName() . '/content/static-revisions/';
        $pageRevisionFolderPath = $pageRevisionRootPath . $pageRef . '/' . $pageRevId . '/';
        $pageRevisionConfigFilePath = $pageRevisionFolderPath . $pageRef . '.htm';
        $pageRevisionMediaFolderPath = $pageRevisionFolderPath . '/media/_rev_/' . $pageRef . '/';

        $pageStaticRootPath = $_SERVER['DOCUMENT_ROOT'] . '/themes/' . Theme::getActiveTheme()->getDirName() . '/content/static-pages/';
        $pageStaticConfigFilePath = $pageStaticRootPath . $pageRef . '.htm';
        $pageMediaFolderPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/app/media/_rev_/' . $pageRef . '/';

        // Check if the relevant page config file is available
        if (!file_exists($pageRevisionConfigFilePath)) {
            trace_log('Missing page config for the given revision.');
            throw new PageManagerException($pageRevisionConfigFilePath);
        }

        // Cleanup the current page config
        if (file_exists($pageStaticConfigFilePath)) {
            unlink($pageStaticConfigFilePath);
        }

        // Cleanup any existing revision backup media folder, which is based on a revision load
        if (file_exists($pageMediaFolderPath) && is_dir($pageMediaFolderPath)) {
            self::cleanFolder($pageMediaFolderPath, false);
        }

        // Copy the revision config file
        copy($pageRevisionConfigFilePath, $pageStaticConfigFilePath);

        // Copy the revision media folder into the normal mediafolder, if available
        if (file_exists($pageRevisionMediaFolderPath)) {
            self::copyFolder($pageRevisionMediaFolderPath, $pageMediaFolderPath);
        }
    }

    /**
     * @return array
     * @throws \ApplicationException
     */
    private static function getBackendPageDataList() {

        $pagesRootPath = $_SERVER['DOCUMENT_ROOT'] . '/themes/' . Theme::getActiveTheme()->getDirName() . '/content/static-pages/';

        $tmpFiles = new \DirectoryIterator($pagesRootPath);
        $filePaths = [];
        $fileDataEntries = [];

        foreach ($tmpFiles as $name => $file) {
            $filePath = $file->getRealPath();

            if (!$file->isDir() && !empty($file->getFilename()) && $file->getFilename()[0] != '.' && $file->getFilename()[0] != '_' && !in_array($filePath, $filePaths)) {
                $filePaths[] = $filePath;
                $fileNameParts = explode('.', $file->getFilename());

                $fileDataEntries[] = [
                    'fullPath' => $filePath,
                    'fileName' => $file->getFilename(),
                    'fileRef' => $fileNameParts[0]
                ];
            }
        }

        return $fileDataEntries;
    }

    /**
     * @param false $ignoreMissingMedia
     * @return array
     */
    public static function initiatePageRevisions($ignoreMissingMedia = false) {

        $errorMessages = [];

        try {
            $pageDataEntries = self::getBackendPageDataList();

            foreach ($pageDataEntries as $pageDataEntry) {
                try {
                    IlumBackRainlabPage::storePageConfig($pageDataEntry['fileRef'], 0);
                    PageManager::storeCurrentPageRevision($pageDataEntry['fileRef'], $ignoreMissingMedia);
                } catch(\Exception $e) {
                    $errorMessages[] = $e->getMessage();
                }
            }
        } catch(\Exception $e) {
            $errorMessages[] = $e->getMessage();
        }

        return $errorMessages;
    }

    /**
     * @return array an array containing the error messages as strings
     */
    public static function publishCurrentPageRevisions() {

        $errorMessages = [];

        try {
            $pageDataEntries = self::getBackendPageDataList();

            foreach ($pageDataEntries as $pageDataEntry) {
                try {
                    PageManager::publishCurrentRevision($pageDataEntry['fileRef']);
                } catch(\Exception $e) {
                    $errorMessages[] = $e->getMessage();
                }
            }
        } catch(\Exception $e) {
            $errorMessages[] = $e->getMessage();
        }

        return $errorMessages;
    }

    /**
     * @param $pageRef
     * @return false|string[] An array containing the following indexes: "folderPath" => A path targeting the bundled stored data, "htmlFilePath" => A path targeting the stored html file
     * @throws PageManagerException
     * @throws \ApplicationException
     * @throws \October\Rain\Exception\ApplicationException
     */
    public static function storeCurrentPageRevision($pageRef, $ignoreMissingMedia = false) {

        $pagesRevisionRootPath = $_SERVER['DOCUMENT_ROOT'] . '/themes/' . Theme::getActiveTheme()->getDirName() . '/content/static-revisions/';

        $pageConfigContent = self::fetchPageTemplateConfigContents($pageRef);
        if (!$pageConfigContent) {
            trace_log("Error while fetching the page config data.");
            throw new PageManagerException('Error while fetching the page config data.');
        }

        if (($pageDbObj = IlumBackRainlabPage::getPageByFileRef($pageRef)) !== null &&
            ($pageRevisison = $pageDbObj->getCurrentRevision()) !== null) {

            $pageRevisionBaseFolder = $pagesRevisionRootPath . $pageRef . '/' . $pageRevisison->revision_id . '/';

            if (file_exists($pageRevisionBaseFolder)) {
                self::cleanFolder($pageRevisionBaseFolder);
            } else {
                mkdir($pageRevisionBaseFolder, 0777, true);
            }

            try {
                $storedContentInfo = self::createPageRevisionContent($pagesRevisionRootPath, $pageRef, $pageRevisison->revision_id, $pageConfigContent, $ignoreMissingMedia);
            } catch(Exception $e) {
                trace_log('Error while preparing the Publishing Folder + Content: ' . $e->getMessage());
                throw new PageManagerException('Error while preparing the Publishing Folder + Content: ' . $e->getMessage());
            }

            return $storedContentInfo;

        } else {
            trace_log('Error while fetching the page / page revision data.');
            throw new PageManagerException('Error while fetching the page / page revision data.');
        }
    }

    /**
     * @param $pageRef
     * @param $publishedPagesPath
     * @param $publishedMediaPath
     * @throws ApplicationException
     * @throws PageManagerException
     * @throws \ApplicationException
     */
    public static function publishCurrentRevision($pageRef) {

        $pagesRevisionRootPath = $_SERVER['DOCUMENT_ROOT'] . '/themes/' . Theme::getActiveTheme()->getDirName() . '/content/static-revisions/';
        $publishedPagesPath = $_SERVER['DOCUMENT_ROOT'] . '/themes/pdb-theme-at/content/static-published/';
        $publishedMediaPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/app/media/_pub_/';

        $prodEnvRootPath = env('PROD_ENV_ROOT', false);
        if ($prodEnvRootPath !== false) {
            $publishedMediaPath = $prodEnvRootPath . 'storage/app/media/_pub_/';
            $publishedPagesPath = $prodEnvRootPath . 'themes/pdb-theme-at/content/static-pages/';

            // Ensure, a PROD environment config is setup
            if (!$prodEnvRootPath || !file_exists($prodEnvRootPath)) {
                throw new PageManagerException('Missing PROD Configuration');
            }

            // Ensure, that the PROD environment is not placed within the staging environment (e.g. pushing won't work from the PROD Environment)
            if (strpos($prodEnvRootPath, $_SERVER['DOCUMENT_ROOT']) !== false) {
                throw new PageManagerException('Invalid PROD Configuration: PROD / STAGING');
            }
        }
//
        if (!file_exists($publishedMediaPath)) {
            mkdir($publishedMediaPath, 0777, true);
        }

        if (!file_exists($publishedPagesPath)) {
            mkdir($publishedPagesPath, 0777, true);
        }

        $backendUser = BackendAuth::getUser();

        if ($backendUser == null) { // || !PageManager::isPageConfigAccessibleByUser($pageRef, $backendUser)) {
            throw new PageManagerException('Access denied !');
        }

        if (empty($pageRef)) {
            throw new PageManagerException('Missing Page Reference');
        }

        if (empty($publishedPagesPath)) {
            throw new PageManagerException('Missing publishing setup data (#1)');
        }

        if (empty($publishedMediaPath)) {
            throw new PageManagerException('Missing publishing setup data (#2)');
        }

        if (file_exists($publishedMediaPath . $pageRef)) {
            PageManager::cleanFolder($publishedMediaPath . $pageRef);
        }

        if (file_exists($publishedPagesPath . $pageRef . '.htm')) {
            unlink($publishedPagesPath . $pageRef . '.htm');
        }

        if (($pageDbObj = IlumBackRainlabPage::getPageByFileRef($pageRef)) !== null &&
            ($pageRevisison = $pageDbObj->getCurrentRevision()) !== null) {

            $revisionPageFilePath = $pagesRevisionRootPath . $pageRef . '/' . $pageDbObj->current_revision_id . '/' . $pageRef . '.htm';
            $revisionMediaFolderPath = $pagesRevisionRootPath . $pageRef . '/' . $pageDbObj->current_revision_id . '/media/_rev_/' . $pageRef . '/';
            if (file_exists($revisionMediaFolderPath)) {
                self::copyFolder($revisionMediaFolderPath, $publishedMediaPath . $pageRef);
            }

            $revisonPageConfig = file_get_contents($revisionPageFilePath);
            $revisonPageConfig = str_replace('_rev_', '_pub_', $revisonPageConfig);
            file_put_contents($publishedPagesPath . $pageRef . '.htm', $revisonPageConfig);

        } else {
            throw new PageManagerException('Missing page data to publish');
        }
    }

    /**
     * Returns the server base url
     * @return string
     */
    private static function getServerBaseUrl() {
        return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'];
    }

    /**
     * @param $pageRevisionRootPath
     * @param $pageRef
     * @param $revisionId
     * @param $pageConfigContent
     * @return string[] An array containing the following indexes: "folderPath" => A path targeting the bundled stored data, "htmlFilePath" => A path targeting the stored html file
     * @throws PageManagerException
     */
    private static function createPageRevisionContent($pageRevisionRootPath, $pageRef, $revisionId, $pageConfigContent, $ignoreMissingMedia = false) {

        // prepare folderPaths to store data
        $finalTmpFolderPath = $pageRevisionRootPath . $pageRef . '/' . $revisionId . '/';
        $finalTmpHtmlFilePath = $finalTmpFolderPath . $pageRef . '.htm';

        $previewImgPathSearch = [];
        $previewImgPathReplace = [];

        // Check if the preview for the current version has already been stored
        $tmpMediaPath = $finalTmpFolderPath . 'media/_rev_/';

        // 01.) Fetch all media path references
        $matchingStrings = [
            '/["\']((?:http[s]?\:\/\/[^@]' . $_SERVER['SERVER_NAME'] . ')?\/[^\.\'"]+?\.[a-zA-Z]+?)["\'\\\\]/',
            '/url\(([^"\'].*?[^"\'])\)/',
        ];

        $tmpMatchData = [];

        $rawMediaPathData = [];
        foreach ($matchingStrings as $matchString) {
            if (preg_match_all($matchString, $pageConfigContent, $tmpMatchData) && count($tmpMatchData) == 2) {
                $rawMediaPathData = array_unique(array_merge($rawMediaPathData, array_unique($tmpMatchData[1])));
            }
        }

        if (!empty($rawMediaPathData)) {
            $processedMediaPathData = [];

            // Prepare file storing
            foreach ($rawMediaPathData as $key => $originalFilePath) {

                $cleanedOriginalFilePath = preg_replace('/http[s]?\:\/\/(www\.)?[a-zA-Z\.]+/', '', $originalFilePath);

                $defaultMediaBasePath = '/storage/app/media/';

                // strip the original project domain, if contained
                $relativeFilePath = preg_replace('/(?:http[s]?\:\/\/(www\.)?)?' . $_SERVER['SERVER_NAME'] . '/', '', $originalFilePath);

                if (($defaultMediaStrPos = strpos($relativeFilePath, $defaultMediaBasePath)) !== false) {
                    $startStr = substr($relativeFilePath, 0, $defaultMediaStrPos + strlen($defaultMediaBasePath));
                    $endStr = substr($relativeFilePath, $defaultMediaStrPos + strlen($defaultMediaBasePath));
                    $relativeFilePath = $startStr . $pageRef . '/' . $endStr;
                } else {
                    $relativeFilePath = '/' . $pageRef . $relativeFilePath;
                    $cleanedOriginalFilePath = $defaultMediaBasePath . substr($cleanedOriginalFilePath, 1);
                }

                $processedMediaPathData[$key] = [
                    'originalFilePath' => $_SERVER['DOCUMENT_ROOT'] . urldecode($cleanedOriginalFilePath),
                    'targetFilePath' => substr($tmpMediaPath, 0, strlen($tmpMediaPath) - 1) . urldecode(str_replace($defaultMediaBasePath, '/', $relativeFilePath))
                ];

                if (($defaultMediaStrPos = strpos($relativeFilePath, $defaultMediaBasePath)) !== false) {
                    $relativeFilePath = str_replace($defaultMediaBasePath, $defaultMediaBasePath . '_rev_/', $relativeFilePath);
                } else {
                    $relativeFilePath = '/_rev_' . $relativeFilePath;
                }

                // Cleanup a second "_rev_/{$pageRefName/" path depth level
                $processedMediaPathData[$key]['targetFilePath'] = preg_replace('/(\/_rev_\/' . $pageRef . ')+/', '/_rev_/' . $pageRef, $processedMediaPathData[$key]['targetFilePath']);
                $relativeFilePath = preg_replace('/(\/_rev_\/' . $pageRef . ')+/', '/_rev_/' . $pageRef, $relativeFilePath);

                $previewImgPathSearch[] = $originalFilePath;
                $previewImgPathReplace[] = $relativeFilePath;
            }

            // Copy image files to preview folder of the current version
            foreach ($processedMediaPathData as $imgPathData) {
                $targetFolderPathParts = explode('/', $imgPathData['targetFilePath']);
                array_pop($targetFolderPathParts);
                $targetFolderPath = implode('/', $targetFolderPathParts);

                if (!file_exists($targetFolderPath)) {
                    mkdir($targetFolderPath, 0777, true);
                }

                if (!$ignoreMissingMedia && !file_exists($imgPathData['originalFilePath'])) {
                    $filePathParts = explode('/', $imgPathData['originalFilePath']);
                    throw new PageManagerException('Speichern fehlgeschlagen - Die folgende Datei ist nicht vorhanden: ' . $imgPathData['originalFilePath']);
                }

                if (file_exists($imgPathData['originalFilePath']) && !file_exists($imgPathData['targetFilePath'])) {
                    copy($imgPathData['originalFilePath'], $imgPathData['targetFilePath']);
                }
            }
        }

        if (!empty($previewImgPathSearch) && count($previewImgPathSearch) == count($previewImgPathReplace)) {
            $pageConfigContent = str_replace($previewImgPathSearch, $previewImgPathReplace, $pageConfigContent);
        }

        // 02.) Refactor all absolute file references, which contain the project domain
//        $pageConfigContent = str_replace(self::getServerBaseUrl(), '', $pageConfigContent);
//        $pageConfigContent = preg_replace('/http[s]?\:\/\/' . $_SERVER['SERVER_NAME'] . '/', '', $pageConfigContent);
//        $pageConfigContent = preg_replace('/http[s]?\:\/\/www\.' . $_SERVER['SERVER_NAME'] . '/', '', $pageConfigContent);
//        $pageConfigContent = preg_replace('/(?:http[s]?\:\/\/www\.)?[^@]' . $_SERVER['SERVER_NAME'] . '/', '', $pageConfigContent);

        file_put_contents($finalTmpHtmlFilePath, $pageConfigContent);

        return [
            'rootTmpFolder' => $finalTmpFolderPath,
            'mediaFolderPath' => $finalTmpFolderPath . 'media/_rev_/' . $pageRef,
            'htmlFilePath' => $finalTmpHtmlFilePath
        ];
    }

    /**
     * Fetches the page configuration as a string from the corresponding stored file
     *
     * @param $pageRef
     * @return false|string
     * @throws \ApplicationException
     */
    private static function fetchPageTemplateConfigContents($pageRef) {
        $pageConfigRootFolder = $_SERVER['DOCUMENT_ROOT'] . '/themes/' . Theme::getActiveTheme()->getDirName() . '/content/static-pages/';
        return file_get_contents($pageConfigRootFolder . $pageRef . '.htm');
    }

    /**
     * Fetches the raw rendered template content for the given mailTemplateURL
     *
     * @param $pageRef
     *
     * @return string the template contents
     */
    private static function fetchRenderedPageContents($pageRef) {
        // Start a new output buffer
        ob_start();

        // Render the page to the buffer
        $controller = new \Cms\Classes\CmsController();
        echo $controller->run($pageRef);

        // Fetch the buffer data
        $rawPageTemplateContents = ob_get_contents();
        // Cleanup page contents from volatile Header Data (e.g. timestamp)
        $rawPageTemplateContents = substr($rawPageTemplateContents, strpos($rawPageTemplateContents, '<!DOCTYPE html'));

        // Cleanup buffer
        ob_end_clean();

        return $rawPageTemplateContents;
    }

    /**
     * Checks if a page configuration exists for the given page reference in the db
     * @param String $pageRef
     * @return bool
     */
    public static function isPageConfigExisting(String $pageRef) {
        return IlumBackRainlabPage::where('page_ref', $pageRef)->first() !== null;
    }


    /**
     * Checks if the given page config is accessible by the given user
     *
     * @param $pageRef
     * @param $user
     * @return bool
     */
    public static function isPageConfigAccessibleByUser(String $pageRef, $user) {

        if (self::isPageAdmin($user)) {
            return true;

        } else if (($ilumePageObj = IlumBackRainlabPage::getPageByFileRef($pageRef)) !== null) {
            $pageCreatorId = -1;
            $pageGrandAccessToGroups = '';
            if ($ilumePageObj !== null) {
                $pageCreatorId = $ilumePageObj->creator_id;
                $pageGrandAccessToGroups = $ilumePageObj->grant_group_access_to;
            }

            if ($pageCreatorId == $user->id) {
                return true;
            }

            $creatorGroups = [];
            if (($creator = User::where('id', $ilumePageObj->creator_id)->first()) !== null) {
                $cGroups = $creator->groups;
                foreach ($cGroups as $group) {
                    $creatorGroups[] = $group->code;
                }
            }

            $userGroups = [];
            foreach ($user->groups as $group) {
                $userGroups[] = $group->code;
            }

            // If any of the user groups matches the creator groups
            if (!empty(array_intersect($userGroups, $creatorGroups))) {
                return true;
            }

            $additionalPageAccessGroups = array_map('trim', explode(',', $pageGrandAccessToGroups));

            // If any of the user groups matches the additional page access groups
            if (!empty(array_intersect($userGroups, $additionalPageAccessGroups))) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if the given user is a page admin (e.g. has the proper backend user group, which appears in the project config)
     *
     * @param $user
     * @return bool
     */
    public static function isPageAdmin($user) {

        $userGroups = $user->groups;
        $pageAdminGroups = array_map('trim', explode(',', env('PAGE_ADMIN_GROUP_CODES', 'owners')));

        foreach ($userGroups as $group) {
            if (in_array($group->code, $pageAdminGroups)) {
                return true;
            }
        }

        return false;
    }

    public static function pageAccessDeniedException() {
        return new PageAccessDeniedException("Access denied.\n\n You can't open/edit pages, you don't have access to !!");
    }
}
