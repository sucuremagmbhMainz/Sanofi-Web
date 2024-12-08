<?php namespace Ilume\Frontend;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use System\Classes\PluginBase;
use App;
use Event;
use Twig\Error\Error;

class Plugin extends PluginBase
{
    private static $embeddedBlockCSS = [];
    private static $embeddedBlockJS = [];
    private static $uniqueTwigIds = [];

    public function pluginDetails()
    {
        return [
            'name'        => 'Ilume Frontend Additions',
            'description' => 'Provides features to the blockbased elements in the frontend.',
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

    public function registerFormWidgets()
    {
        return [
            'Ilume\Frontend\FormWidgets\IlumeFileUpload' => 'ilumefileupload'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        // Ensure, that we are currently in frontend module.
        if (App::runningInBackend()) {
            return;
        }

        $filtered = false;
        Event::listen('cms.page.postprocess', function($controller, $url, $page, $dataHolder) use(&$filtered) {
            if (!$filtered && gettype($dataHolder->content) == 'string') {
                // Find the title tag content range, if available
                $headStart = strpos($dataHolder->content, '<head>');
                $endStart = strpos($dataHolder->content, '</head>');

                // If we have a title tag with appropriate content
                if ($headStart && $endStart) {
                    $titleContent = substr($dataHolder->content, $headStart, ($endStart - $headStart));

                    $contentBeforeTitle = substr($dataHolder->content, 0, $headStart);
                    $contentAfterTitle = substr($dataHolder->content, $endStart);

                    // Apply trademark html <sup> extension only to non title-tag content
                    $contentBeforeTitle = $this->applyTrademarkSup($contentBeforeTitle);
                    $contentAfterTitle = $this->applyTrademarkSup($contentAfterTitle);

                    $dataHolder->content = $contentBeforeTitle . $titleContent . $contentAfterTitle;
                } else {
                    $dataHolder->content = $this->applyTrademarkSup($dataHolder->content);
                }
            }
            $filtered = true;

            return $dataHolder->content;
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        // Ensure, that we are currently in frontend module.
        if (App::runningInBackend()) {
            return[];
        }

        return [
            'Ilume\Frontend\Components\ExtApiProvisioner' => 'extApiProvisioner',
        ];
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
        // Ensure, that we are currently in frontend module.
        if (App::runningInBackend()) {
            return[];
        }

        return [
            'filters' => [
                'pregReplace' => [$this, 'pregReplaceTwigFilter'],
//                'trademarks' => [$this, 'applyTrademarkSup'],
                'prepBlockSCSS' => [$this, 'prepBlockSCSSLink'],
                'prepBlockResponsiveSCSS' => [$this, 'prepResponsiveBlockSCSSLink'],
                'prepBlockJS' => [$this, 'prepBlockJS'],
                'embedCSS' => [$this, 'createCSSTag'],
                'embedJS' => [$this, 'createJSTag'],
                'uniqueID' => [$this, 'createUniqueTwigId'],
                'firstUrlPart' => [$this, 'extractFirstUrlPart'],

            ],
            'functions' => [
                // Basic helper methods
                'getAvailableBlockPaths' => [$this, 'getAvailableBlockPaths'],
            ]
        ];
    }

    /**
     * Wraps the standard php preg_replace method as twig filter method
     *
     * @param $subject
     * @param $pattern
     * @param $replacement
     * @return string|string[]|null
     */
    public function pregReplaceTwigFilter($subject, $pattern, $replacement) {
        return preg_replace($pattern, $replacement, $subject);
    }


    /**
     * Extracts the first part of a URL and returns it.
     * @param $path string
     * @return string
     */
    public function extractFirstUrlPart($path){
        $firstPart = explode('/',$path);

        if(count($firstPart) > 2){
            return strval($firstPart[1]);
        }
        else{
            return "";
        }
    }

    public function createCSSTag($cssSourcePath) {
        // If the source path is empty or if the CSS Tag for the given source path has already been rendered before, output nothing
        if (strlen($cssSourcePath) == 0 || in_array($cssSourcePath, Plugin::$embeddedBlockCSS)) {
            return "";
        }

        Plugin::$embeddedBlockCSS[] = $cssSourcePath;

        return "<link href=\"$cssSourcePath\" rel=\"stylesheet\">";
    }

    public function createJSTag($jsSourcePath) {
        // If the source path is empty or if the Tag for the given source path has already been rendered before, output nothing
        if (strlen($jsSourcePath) == 0 || in_array($jsSourcePath, Plugin::$embeddedBlockJS)) {
            return "";
        }

        Plugin::$embeddedBlockJS[] = $jsSourcePath;

        return "<script type=\"text/javascript\" src=\"$jsSourcePath\"></script>";
    }

    public function prepBlockJS($blockBasePath) {
        $jsPathStartPos = strpos($blockBasePath, "partials");

        if (!$jsPathStartPos) {
            throw new Error("The given block path is missing relevant path parts !", -1);
        }
        $scssBasePath = substr($blockBasePath, $jsPathStartPos, strlen($blockBasePath) - $jsPathStartPos);

        $pathParts = explode('/', $scssBasePath );

        // Remove last part (e.g. filename of the block template)
        array_pop($pathParts);

        $pathParts[] = 'js';

        $pathParts[] = 'block.js';

        return implode('/', $pathParts);
    }

    public function createUniqueTwigId($baseStr) {
        if (!in_array($baseStr, array_keys(Plugin::$uniqueTwigIds))) {
            Plugin::$uniqueTwigIds[$baseStr] = 0;
        } else {
            Plugin::$uniqueTwigIds[$baseStr] += 1;
        }

        return $baseStr . '-' . Plugin::$uniqueTwigIds[$baseStr];
    }

    public function getAvailableBlockPaths($blockBasePath, string $blockFolderStr) {
        $parseBlockFolders = array_map(function($entry) {
            return trim($entry);
        }, explode(',', $blockFolderStr));
        $blockFolderBasePath = themes_path($blockBasePath);

        $blockPathArr = array();
        foreach ($parseBlockFolders as $subBlockFolderName) {
            $blockPathArr = array_merge($blockPathArr, $this->getSubBlockPathRefsFromFolder($blockFolderBasePath, $subBlockFolderName, $blockPathArr));
        }

        return $blockPathArr;
    }

    public function getSubBlockPathRefsFromFolder($blockFolderBasePath, $subBlockFolderName, array $currentBlockPathArr = array()) {
        $blockFolderPath = $blockFolderBasePath . '/' . $subBlockFolderName . '/';
        $subFileEntries = scandir($blockFolderPath);

        foreach ($subFileEntries as $index => $entry) {

            $subGroupFolderPath = $blockFolderPath . '/' . $entry;

            if (is_dir($subGroupFolderPath) && $entry[0] != '.' && $entry[0] != '#') {
                $possibleConfigPath = $subGroupFolderPath . '/_config.yaml';

                if (file_exists($possibleConfigPath)) {
                    if (!array_key_exists($entry, $currentBlockPathArr)) {
                        $currentBlockPathArr[$entry] = 'blocks/' . $subBlockFolderName . '/' . $entry . '/' . $entry;
                    }
                } else {
                    $nextBlockFolderBasePath = $blockFolderBasePath . $entry . '/';
                    $currentBlockPathArr = array_merge($currentBlockPathArr, $this->getSubBlockPathRefsFromFolder($subGroupFolderPath, $nextBlockFolderBasePath, $currentBlockPathArr));
                }
            }
        }

        return $currentBlockPathArr;
    }

    /**
     * Parses the given block file path and prepares the URL to the corresponding responsive SCSS File, if available
     *
     * @param $blockFilePath string The filepath to the block template as a string
     * @return string A path to the block scss file (e.g. ../style.scss)
     * @throws Error
     */
    public function prepResponsiveBlockSCSSLink($blockFilePath)
    {
        return $this->prepBlockSCSSLink($blockFilePath, true);
    }

    /**
     * Parses the given block file path and prepares the URL to the corresponding SCSS File, if available
     *
     * @param $blockFilePath string The filepath to the block template as a string
     * @param $responsiveFileLink bool A flag indicating, that the path to the responsive style file should be created
     * @return string A path to the block scss file (e.g. ../style.scss)
     * @throws Error
     */
    public function prepBlockSCSSLink($blockFilePath, $responsiveFileLink = false) {

        $scssPathStartPos = strpos($blockFilePath, "partials");

        if (!$scssPathStartPos) {
            throw new Error("The given block path is missing relevant path parts !", -1);
        }
        $scssBasePath = substr($blockFilePath, $scssPathStartPos, strlen($blockFilePath) - $scssPathStartPos);

        $pathParts = explode('/', $scssBasePath );

        // Remove last part (e.g. filename of the block template)
        array_pop($pathParts);

        $pathParts[] = 'style';

        if ($responsiveFileLink) {
            $pathParts[] = 'block-responsive.scss';
        } else {
            $pathParts[] = 'block.scss';
        }

        return implode('/', $pathParts);
    }

    public function applyTrademarkSup ( $text ) { return $text; }
}