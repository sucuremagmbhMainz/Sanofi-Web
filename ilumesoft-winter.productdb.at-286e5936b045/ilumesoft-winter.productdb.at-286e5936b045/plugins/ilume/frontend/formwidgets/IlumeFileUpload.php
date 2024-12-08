<?php namespace Ilume\Frontend\FormWidgets;

use Db;
use Illuminate\Support\Facades\App;
use Input;
use October\Rain\Exception\SystemException;
use Request;
use Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Validator;
use Backend\Widgets\Form;
use Backend\Classes\FormField;
use Backend\Classes\FormWidgetBase;
use October\Rain\Filesystem\Definitions as FileDefinitions;
use ValidationException;
use Exception;
use System\Models\File;
use File as FileHelper;

class FileUploadException extends Exception {}
class UserFileUploadException extends FileUploadException {}
class InvalidFileException extends FileUploadException {}

/**
 * IlumeFileUpload Form Widget
 */
class IlumeFileUpload extends FormWidgetBase
{
    use \Backend\Traits\FormModelSaver;
    use \Backend\Traits\FormModelWidget;

    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'ilumefileupload';

    /**
     * @var mixed Collection of acceptable file types.
     */
    public $fileTypes = false;

    /**
     * @var mixed Collection of acceptable mime types.
     */
    public $mimeTypes = false;

    /**
     * @var mixed Max file size.
     */
    public $maxFilesize;

    /**
     * @var bool Defines if file data is required
     */
    public $isRequired = false;

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->maxFilesize = $this->getUploadMaxFilesize();

        $this->fillFromConfig([
            'fileTypes',
            'maxFilesize',
            'mimeTypes',
            'isRequired'
        ]);

        App::error(function(FileUploadException $exception) {
            if ($exception instanceof InvalidFileException) {
                return 'Dateiformat ungültig';
            } else if ($exception instanceof UserFileUploadException) {
                return $exception->getMessage();
            } else {
                return 'Der Dateiupload ist zur Zeit nicht nutzbar, bitte versuchen Sie es später noch einmal.';
            }
        });
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();

        return $this->makePartial('ilumefileupload');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['model'] = $this->model;

        $this->vars['fileList'] = $fileList = $this->getFileList();
        $this->vars['singleFile'] = $fileList->first();

        $this->vars['maxFilesize'] = $this->maxFilesize;

        $this->vars['acceptedFileTypes'] = $this->getAcceptedFileTypes(true);
        $this->vars['prompt'] = "- Keine Datei angehängt -";

        if ($this->maxFilesize > $this->getUploadMaxFilesize()) {
            throw new FileUploadException('Maximum allowed size for uploaded files: ' . $this->getUploadMaxFilesize());
        }
    }

    protected function getFileList()
    {
        $list = $this
            ->getRelationObject()
            ->withDeferred($this->sessionKey)
            ->orderBy('sort_order')
            ->get()
        ;

        /*
         * Decorate each file with thumb and custom download path
         */
        $list->each(function ($file) {
            $this->decorateFileAttributes($file);
        });

        return $list;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/ilumefileupload.css', 'core');
        $this->addJs('js/ilumefileupload.js', 'core');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        $tmpFileCreated = false;

        // Skip empty file upload elements, which aren't required
        if (empty($value)) {
            if ($this->isRequired) {
                throw new UserFileUploadException("Bitte wählen Sie eine Datei für den Upload aus");
            } else{
                // Ignore the input, if not required
                return;
            }
        }

        try {
            $fileData = explode('|', $value);

            if (count($fileData) != 2) {
                throw new InvalidFileException('Unvollständiger Datenstring für den Dateiupload (base64 daten + dateiname benötigt)');
            }

            $base64Marker = ';base64,';

            $fileData64RawStr = $fileData[0];
            $fileName = $fileData[1];

            // ###### Base64 format check ##############################################################################
            if (!(strpos($fileData64RawStr, $base64Marker) > 0)) {
                throw new InvalidFileException("Ungültige Base64 Daten");
            }

            // ###### Filename Check ###################################################################################
            if (strlen($fileData[1]) == 0) {
                throw new InvalidFileException("Fehlender Dateiname");
            }

            // ###### FileType / MimeType Validation ###################################################################

            $contentTypeStartPos = strpos($fileData64RawStr, ':');
            $contentTypeEndPos = strpos($fileData64RawStr, ';');

            if (!$contentTypeStartPos || !$contentTypeEndPos) {
                throw new InvalidFileException("Mimetype nicht feststellbar");
            }

            $contentType = substr($fileData64RawStr, $contentTypeStartPos, $contentTypeEndPos - $contentTypeStartPos);
            if (strlen($contentType) == 0) {
                throw new InvalidFileException("Ungültiger Mimetype");
            }

            $fileNameParts = explode('.', $fileName);
            $fileType = count($fileNameParts) >= 2 ? $fileNameParts[count($fileNameParts) - 1] : false;
            if (!$fileType || ($this->mimeTypes && !strpos($contentType, $this->mimeTypes))) {
                throw new UserFileUploadException("Dateityp nicht feststellbar");
            }

            $acceptedFileTypes = $this->getAcceptedFileTypes();
            if ($acceptedFileTypes && strpos($acceptedFileTypes, $fileType) === false) {
                throw new UserFileUploadException("Ungültiger Dateityp - Erlaubte Dateitypen: " . $this->fileTypes);
            }

            // ###### Filesize Validation ##############################################################################
            // Get base64 relevant data str
            $fileData64RawStr = explode(',', $fileData64RawStr)[1];

            // Replace url encoded space characters with the correct space character
            $fileBase64Clean = str_replace(' ', '+', $fileData64RawStr);

            $fileData = base64_decode($fileBase64Clean);


            // ###### Templ file storing + Size Check ##################################################################
            // Store tmp file
            $tempPath = temp_path($fileName);
            FileHelper::put($tempPath, $fileData);
            $tmpFileCreated = true;

            $fileModel = $this->getRelationModel();

            // Ensure maximum filesize limit
            $tmpFileSize = filesize($tempPath)/1024/1024;;
            if ($tmpFileSize > $this->maxFilesize) {
                throw new UserFileUploadException("Dateigröße überschritten (max. " . $this->maxFilesize . " Mb)");
            }

            $uploadedFile = new UploadedFile(
                $tempPath,
                $fileName,
                $contentType,
                filesize($tempPath),
                null,
                false
            );

            // ###### Model Storing + protected File Storing ###########################################################

            $fileRelation = $this->getRelationObject();

            $file = $fileModel;
            $file->data = $uploadedFile;

            // Uploaded files shouldn't be public
            $file->is_public = false;

            $file->save();

            // Cleanup tmp file
            if ($tmpFileCreated) {
                FileHelper::delete($tempPath);
                $tmpFileCreated = false;
            }

            // ###### Model Linking ####################################################################################
            /**
             * Attach directly to the parent model if it exists and attachOnUpload has been set to true
             * else attach via deferred binding
             */
            $parent = $fileRelation->getParent();
            if ($this->attachOnUpload && $parent && $parent->exists) {
                $fileRelation->add($file);
            }
            else {
                $fileRelation->add($file, $this->sessionKey);
            }

            $this->decorateFileAttributes($file);
        }
        catch (Exception $ex) {
            throw $ex;

        } finally {
            // Cleanup tmp file
            if ($tmpFileCreated) {
                FileHelper::delete($tempPath);
            }
        }

        // No saved data - due to to the stored file, which will be linked already here
        return FormField::NO_SAVE_DATA;
    }

    /**
     * Adds the bespoke attributes used internally by this widget.
     * - thumbUrl
     * - pathUrl
     * @return System\Models\File
     */
    protected function decorateFileAttributes($file)
    {
        $path = $thumb = $file->getPath();

        $file->pathUrl = $path;
        $file->thumbUrl = $thumb;

        return $file;
    }

    /**
     * Return max upload filesize in Mb
     * @return integer
     */
    protected function getUploadMaxFilesize()
    {
        $size = ini_get('upload_max_filesize');
        if (preg_match('/^([\d\.]+)([KMG])$/i', $size, $match)) {
            $pos = array_search($match[2], ['K', 'M', 'G']);
            if ($pos !== false) {
                $size = $match[1] * pow(1024, $pos + 1);
            }
        }
        return floor($size / 1024 / 1024);
    }



    /**
     * Returns the specified accepted file types, or the default
     * based on the mode. Image mode will return:
     * - jpg,jpeg,bmp,png,gif,svg
     * @return string
     */
    public function getAcceptedFileTypes($includeDot = false)
    {
        $types = $this->fileTypes;

        if (!$types || $types == '*') {
            return null;
        }

        if (!is_array($types)) {
            $types = explode(',', $types);
        }

        $types = array_map(function ($value) use ($includeDot) {
            $value = trim($value);

            if (substr($value, 0, 1) == '.') {
                $value = substr($value, 1);
            }

            if ($includeDot) {
                $value = '.'.$value;
            }

            return $value;
        }, $types);

        return implode(',', $types);
    }
}
