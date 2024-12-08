<?php namespace Ilume\Backend\Models;

use Backend\Facades\BackendAuth;
use Illuminate\Support\Facades\DB;
use Model;
use October\Rain\Exception\ApplicationException;
use RainLab\Pages\Classes\Page;

/**
 * Model
 */
class IlumBackRainlabPage extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'ilume_backend_rainlab_pages';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $timestamps = true;

    /**
     * @param String $fileRef
     * @return mixed
     * @throws ApplicationException
     */
    public static function getPageByFileRef(String $fileRef) {

        if (empty($fileRef)) {
            return null;
        }

        $ilumePageObj = self::where('page_ref', $fileRef)->first();

        // If no page related data has been found, it has to be created new
        if ($ilumePageObj == null) {
            // Get first backend user

            $mainAdminUser = Db::table('backend_users')
                ->where('is_superuser', '1')
                ->orderBy('id', 'asc')
                ->first();

            if ($mainAdminUser == null) {
                throw new ApplicationException("No Backend Admin found - Please contact an external administrator ;)");
            }

            return null;
        }

        return $ilumePageObj;
    }

    /**
     * Creates a page configuration entry in the DB Table (ilume_backend_rainlab_pages)
     * @param $pageRef
     * @param $creatorId
     */
    public static function storePageConfig($pageRef, $creatorId) {
        $ilumePageObj = new IlumBackRainlabPage();
        $ilumePageObj->creator_id = $creatorId;
        $ilumePageObj->page_ref = $pageRef;
        $ilumePageObj->grant_group_access_to = '';
        $ilumePageObj->current_revision_id = 0;
        $ilumePageObj->save();

        return $ilumePageObj;
    }

    /**
     * @param Page $page
     * @return mixed
     * @throws ApplicationException
     */
    public static function getPageByRainlabRef(Page $page) {
        if ($page == null) {
            throw new ApplicationException("Missing Page Object!!");
        }

        $fileRef = $page->getBaseFileName();

        if (empty($fileRef)) {
            return null;
        }

        return self::getPageByFileRef($fileRef);
    }

    /**
     * @return IlumBackRainlabPageRevision|null
     * @throws ApplicationException
     */
    public function getCurrentRevision() {
        return IlumBackRainlabPageRevision::getRevision($this->id, $this->current_revision_id);
    }

    public function getAllRevisions() {
        return IlumBackRainlabPageRevision::where('page_id', $this->id)->get();
    }

    public function getRevisionCount() {
        return IlumBackRainlabPageRevision::where('page_id', $this->id)->count();
    }

    public function hasRevisionWithName($revName) {
        return IlumBackRainlabPageRevision::where('page_id', $this->id)->where('revision_name', $revName)->count() > 0;
    }

    public function createRevision(string $revName) {
        if (strlen($revName) == 0) {
            throw new \ApplicationException('Missing Revision Name');
        }

        $backendUser = BackendAuth::getUser();

        if ($backendUser == null) {
            throw new \ApplicationException('Missing Backend User');
        }

        $revision = new IlumBackRainlabPageRevision();
        $revision->page_id = $this->id;
        $revision->revision_id = $this->getRevisionCount();
        $revision->revision_name = $revName;
        $revision->last_editor_id = $backendUser->id;

        $revision->save();
    }

    public function beforeCreate()
    {
        // Enforce updated_at value write (flag "timestamps = true" is not working)
        $this->created_at = time();
    }

    public function beforeSave()
    {
        // Enforce updated_at value write (flag "timestamps = true" is not working)
        $this->updated_at = time();
    }
}
