<?php

use Backend\Facades\BackendAuth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Ilume\Backend\Classes\PageManager;
use Ilume\Backend\Models\IlumBackRainlabPage;
use Ilume\Backend\Plugin;

Route::get('/ilume/dynamic-ilume-backend.js', function () {

    $backendUser = BackendAuth::getUser();

    $response =  'function processRestrictedWidgets(inDom) {}';
    if (!PageManager::isPageAdmin($backendUser)) {
        $userId = -1;
        if ($backendUser !== null) {
            $userId = $backendUser->id;
        }
        $tagListSelector = '.restrict-usage:not(.taglist-only-for-' . $userId . ')';

        $response = '
            function processRestrictedWidgets(inDom) {
                let inactiveTagListElements = inDom.querySelectorAll(\'' . $tagListSelector . '\');

                for(let inactiveTagListElement of inactiveTagListElements) {
                    inactiveTagListElement.querySelectorAll(\'select\').forEach(function (node) {
                        node.setAttribute("disabled", "disabled");
                    });

                    inactiveTagListElement.querySelectorAll(\'li\').forEach(function (node) {
                        node.setAttribute("style", "color:blue");
                    });
                }
            }';
    }

    return response($response, 200)
        ->header('Content-Type', 'application/javascript');
})->middleware('web');

Route::get('/ilume/dynamic-ilume-backend.css', function () {

    $backendUser = BackendAuth::getUser();
    $userId = 0;
    if ($backendUser !== null) {
        $userId = $backendUser->id;
    }
    $tagListSelector = '.taglist.restrict-usage';

    if (!PageManager::isPageAdmin($backendUser)) {
        $tagListSelector .= '.taglist-only-for-' . $userId;
    }

    $response =
        $tagListSelector . ' .selection li {
            color: #fff !important;
        }
    ';

    return response($response, 200)
        ->header('Content-Type', 'text/css');
})->middleware('web');


/**
 * Used for generating a mail preview and sending it to a specific mail adress
 */
Route::get('publish/{pagerRef}', function ($pageRef) {
    if (!BackendAuth::check()) {
        App::abort(404);
        exit;
    }

    if (!is_string($pageRef) || empty($pageRef)) {
        return json_encode(
            [
                'result' => 'error',
                'msg' => 'Missing Template Selection'
            ]
        );
    }

    try {
        PageManager::publishCurrentRevision($pageRef);
    } catch (Exception $e) {
        return json_encode(
            [
                'result' => 'error',
                'msg' => $e->getMessage()
            ]
        );
    }

    return json_encode(
        [
            'result' => 'success',
            'msg' => 'The Page has been published !'
        ]
    );
})->middleware('web');

Route::get('getRevisionList/{pagerRef}', function ($pageRef) {
    if (!BackendAuth::check()) {
        App::abort(404);
        exit;
    }

    if (!is_string($pageRef) || empty($pageRef)) {
        return json_encode(
            [
                'result' => 'error',
                'msg' => 'Missing Template Selection'
            ]
        );
    }

    if (($pageObj = IlumBackRainlabPage::getPageByFileRef($pageRef)) !== null) {
        if (($pageRevisions = $pageObj->getAllRevisions()) !== null &&
            ($currentPageRevision = $pageObj->getCurrentRevision()) !== null) {

            $revisionSelectData = [];
            foreach ($pageRevisions as $revision) {
                $revisionSelectData[] = [
                    'key' => $revision->revision_id,
                    'label' => (count($revisionSelectData) + 1) . '. ' . $revision->revision_name,
                    'selected' => ($revision->id == $currentPageRevision->id) ? 1 : 0,
                ];
            }

            if (empty($revisionSelectData)) {
                return json_encode(
                    [
                        'result' => 'error',
                        'msg' => 'Couldn\'t prepare page revision data'
                    ]
                );
            }


            return json_encode(
                [
                    'result' => 'success',
                    'msg' => $revisionSelectData
                ]
            );
        } else {
            return json_encode(
                [
                    'result' => 'error',
                    'msg' => 'Missing page revisions'
                ]
            );
        }
    } else {
        return json_encode(
            [
                'result' => 'error',
                'msg' => 'Page Data not found'
            ]
        );
    }

})->middleware('web');

/**
 * @param false $ignoreMissingMedia
 */
function initiatePages($ignoreMissingMedia = false) {
    $backendUser = BackendAuth::getUser();
    if ($backendUser == null || $backendUser->is_superuser !== 1) {
        throw new ApplicationException('Access denied !');
    }

    /**
     * 1. Create Basic Revisions
     */
    $errorMessages = PageManager::initiatePageRevisions($ignoreMissingMedia);
    print('<h2>Page-Revision-Creation (Errors):</h2>');
    dump($errorMessages);

    /**
     * 1. Publish Pages
     */
    $errorMessages = PageManager::publishCurrentPageRevisions();
    print('<h2>Page-Publishing (Errors):</h2>');
    dd($errorMessages);
}

Route::get('/backend/initiatePages/', function () {
    $ignoreMissingMedia = false;

    initiatePages($ignoreMissingMedia);
})->middleware('web');

Route::get('/backend/initiatePages/{ignoreMediaExt}', function ($ignoreMediaExt) {
    $ignoreMissingMedia = $ignoreMediaExt == 'ignoreMissingMedia';

    initiatePages($ignoreMissingMedia);
})->middleware('web');
