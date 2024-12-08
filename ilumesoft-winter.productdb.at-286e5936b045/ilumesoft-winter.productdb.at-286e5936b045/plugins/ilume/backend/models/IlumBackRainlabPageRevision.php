<?php namespace Ilume\Backend\Models;

use Backend\Facades\BackendAuth;
use Illuminate\Support\Facades\DB;
use Model;
use October\Rain\Exception\ApplicationException;
use RainLab\Pages\Classes\Page;

/**
 * Model
 */
class IlumBackRainlabPageRevision extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'ilume_backend_rainlab_page_revisions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $timestamps = true;

    /**
     * Fetches the revision data for the given pageId and revId. Creates a new DB Row, if not available
     *
     * @param $pageId
     * @param $revId
     * @return IlumBackRainlabPageRevision|null
     * @throws ApplicationException
     */
    public static function getRevision($pageId, $revId) {

        if (!is_numeric($pageId)) {
            return null;
        }

        if (!is_numeric($revId)) {
            return null;
        }

        $ilumePageRevObj = self::where('page_id', $pageId)
                                ->where('revision_id', $revId)->first();

        if ($ilumePageRevObj == null && $revId == 0) {
            $backendUser = BackendAuth::getUser();

            if ($backendUser == null) {
                throw new ApplicationException("Missing Backend User");
            }

            $ilumePageRevObj = new IlumBackRainlabPageRevision();
            $ilumePageRevObj->page_id = $pageId;
            $ilumePageRevObj->revision_id = $revId;
            $ilumePageRevObj->revision_name = 'Basis';
            $ilumePageRevObj->last_editor_id = $backendUser->id;
            $ilumePageRevObj->save();
        }

        return $ilumePageRevObj;
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
