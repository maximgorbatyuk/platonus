<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 02.04.2017
 * Time: 11:11
 */

namespace App\Traits;
use App\Models\File;
use App\ViewModels\FineUploadResult;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

/**
 * Class FileUploader
 * @package Traits
 *
 * Трейт содержит в себе проверку файла от либы FineUploader и осуществляет возврат
 * сообщений именно в том виде, в котором ждет клиент.
 */
trait FileUploader
{
    protected $allowedExtensions = array();
    protected $sizeLimit = null;
    protected $inputName = 'qqfile';
    protected $chunksFolder = 'chunks';

    public $chunksCleanupProbability = 0.001; // Once in 1000 requests on avg
    public $chunksExpireIn = 604800; // One week

    protected $uploadName;
    protected $uploadDirectory = 'uploads';

    /** @var Request|null $Request */
    private $request = null;

    /**
     * @param Request $request
     */
    public function InitRequest(Request $request){
        $this->request = $request;
    }

    /**
     * Get the original filename
     */
    public function getName(){

        $name = $this->request->input('qqfilename');
        if (!is_null($name)) {
            return $name;
        }

        $files = $this->request->files;
        /** @var UploadedFile $file */
        $file = $files->get($this->inputName);
        if (!is_null($file))
            return $file->getFilename();
        return null;
    }

    /**
     * Get the name of the uploaded file
     */
    public function getUploadName(){
        return $this->uploadName;
    }

    public function combineChunks($name = null) {
        $uuid = $this->request->input('qquuid');
        if ($name === null){
            $name = $this->getName();
        }
        $targetFolder = $this->chunksFolder.DIRECTORY_SEPARATOR.$uuid;
        $totalParts = !is_null($this->request->input('qqtotalparts')) ? (int)$this->request->input('qqtotalparts') : 1;

        $targetPath = join(DIRECTORY_SEPARATOR, array($this->uploadDirectory, $uuid, $name));
        $this->uploadName = $name;

        if (!file_exists($targetPath)){
            mkdir(dirname($targetPath), 0777, true);
        }
        $target = fopen($targetPath, 'wb');

        for ($i=0; $i<$totalParts; $i++){
            $chunk = fopen($targetFolder.DIRECTORY_SEPARATOR.$i, "rb");
            stream_copy_to_stream($chunk, $target);
            fclose($chunk);
        }

        // Success
        fclose($target);

        for ($i=0; $i<$totalParts; $i++){
            unlink($targetFolder.DIRECTORY_SEPARATOR.$i);
        }

        rmdir($targetFolder);

        if (!is_null($this->sizeLimit) && filesize($targetPath) > $this->sizeLimit) {
            unlink($targetPath);
            http_response_code(413);
            return [
                "success" => false,
                "uuid" => $uuid,
                "preventRetry" => true
            ];
        }

        return [
            "success" => true,
            "uuid" => $uuid
        ];
    }

    /**
     * Запускает обработчик загрузки файла
     * @param Request $request
     * @return FineUploadResult
     */
    public function handleUpload(Request $request){

        $result = new FineUploadResult();
        $this->request = $request;

        if (is_writable($this->chunksFolder) &&
            1 == mt_rand(1, 1/$this->chunksCleanupProbability)){

            // Run garbage collection
            $this->cleanupChunks();
        }

        // Check that the max upload size specified in class configuration does not
        // exceed size allowed by server config
        if ($this->toBytes(ini_get('post_max_size')) < $this->sizeLimit ||
            $this->toBytes(ini_get('upload_max_filesize')) < $this->sizeLimit)
        {
            $neededRequestSize = max(1, $this->sizeLimit / 1024 / 1024) . 'M';

            $result->error = "Server error. Increase post_max_size and upload_max_filesize to $neededRequestSize";
            return $result;
        }

        /*if ($this->isInaccessible($this->uploadDirectory))
        {
            $result->error = "Server error. Uploads directory isn't writable";
            return $result;
        }*/

        $type = $this->request->server('CONTENT_TYPE');
        $httpContentType = $this->request->server('HTTP_CONTENT_TYPE');

        if (!is_null($httpContentType)) {
            $type = $httpContentType;
        }

        if(is_null($type))
        {
            $result->error = "No files were uploaded.";
            return $result;
        }
        else if (strpos(strtolower($type), 'multipart/') !== 0)
        {
            $result->error = "Server error. Not a multipart request. Please set forceMultipart to default value (true).";
            return $result;
        }

        // Get size and name

        /** @var UploadedFile $file */
        $file = $this->request->file($this->inputName);
        $size = $file->getSize();

        if (!is_null($this->request->input('qqtotalfilesize'))) {
            $size = $this->request->input('qqtotalfilesize');
        }

        $name = $this->getName();

        // check file error
        if($file->getError() != UPLOAD_ERR_OK)
        {
            $result->error = 'Upload Error #'.$file->getErrorMessage();
            return $result;
        }

        // Validate name
        if ($name === null || $name === '')
        {
            $result->error = 'File name empty.';
            return $result;
        }

        // Validate file size
        if ($size == 0){
            $result->error = 'File is empty.';
            return $result;
        }

        if (!is_null($this->sizeLimit) && $size > $this->sizeLimit) {
            $result->error = 'File is too large.';
            $result->preventRetry = true;
            return $result;
        }

        // Validate file extension
        $pathinfo = pathinfo($name);
        $ext = isset($pathinfo['extension']) ? $pathinfo['extension'] : '';

        if($this->allowedExtensions && !in_array(strtolower($ext), array_map("strtolower", $this->allowedExtensions))){
            $these = implode(', ', $this->allowedExtensions);
            $result->error = "File has an invalid extension, it should be one of $these.";
            return $result;
        }

        // Save a chunk
        $qqTalParts = $this->request->input('qqtotalparts');
        $totalParts = !is_null($qqTalParts) ? (int)$qqTalParts : 1;

        $uuid = $this->request->input('qquuid');
        if ($totalParts > 1){

            $storedFilename = $file->store('uploads');

            $result->success = true;
            $result->storedFilename = $storedFilename;
            $result->uploadName = $this->getUploadName();
            $result->uuid = $uuid;

            return $result;

        }
        $this->uploadName = $name;
        $storedFilename = $file->store('uploads');

        //$path = str_replace('uploads/
        $path = $file->hashName();
        $result->success = true;
        $result->storedFilename = $path;
        $result->uploadName = $this->getUploadName();
        $result->uuid = $uuid;

        return $result;
    }

    /**
     * Process a delete.
     * @return array
     * @params string $name Overwrites the name of the file.
     */
    public function handleDelete()
    {
        if ($this->isInaccessible($this->uploadDirectory)) {
            return array('error' => "Server error. Uploads directory isn't writable" . ((!$this->isWindows()) ? " or executable." : "."));
        }

        $targetFolder = $this->uploadDirectory;
        $uuid = false;

        $method = $this->request->method();
        if ($method == "DELETE") {

            $requestUri = $this->request->getUri();
            $url = parse_url($requestUri, PHP_URL_PATH);
            $tokens = explode('/', $url);
            $uuid = $tokens[sizeof($tokens)-1];
        }
        else if ($method == "POST") {

            $uuid = $this->request->input('qquuid');
        } else
            {
            return [
                "success" => false,
                "error" => "Invalid request method! ".$method
            ];
        }

        $target = join(DIRECTORY_SEPARATOR, array($targetFolder, $uuid));

        if (is_dir($target)){
            $this->removeDir($target);
            return array("success" => true, "uuid" => $uuid);
        } else {
            return array("success" => false,
                "error" => "File not found! Unable to delete.".$url,
                "path" => $uuid
            );
        }

    }

    /**
     * Deletes all file parts in the chunks folder for files uploaded
     * more than chunksExpireIn seconds ago
     */
    protected function cleanupChunks(){
        foreach (scandir($this->chunksFolder) as $item){
            if ($item == "." || $item == "..")
                continue;

            $path = $this->chunksFolder.DIRECTORY_SEPARATOR.$item;

            if (!is_dir($path))
                continue;

            if (time() - filemtime($path) > $this->chunksExpireIn){
                $this->removeDir($path);
            }
        }
    }

    /**
     * Removes a directory and all files contained inside
     * @param string $dir
     */
    protected function removeDir($dir){
        foreach (scandir($dir) as $item){
            if ($item == "." || $item == "..")
                continue;

            if (is_dir($item)){
                $this->removeDir($item);
            } else {
                unlink(join(DIRECTORY_SEPARATOR, array($dir, $item)));
            }

        }
        rmdir($dir);
    }

    /**
     * Converts a given size with units to bytes.
     * @param string $str
     * @return int
     */
    protected function toBytes($str){
        $str = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        $val = -1;
        if(is_numeric($last)) {
            $val = (int) $str;
        } else {
            $val = (int) substr($str, 0, -1);
        }
        switch($last) {
            case 'g': case 'G': $val *= 1024;
            case 'm': case 'M': $val *= 1024;
            case 'k': case 'K': $val *= 1024;
        }
        return $val;
    }

    /**
     * Determines whether a directory can be accessed.
     *
     * is_executable() is not reliable on Windows prior PHP 5.0.0
     *  (http://www.php.net/manual/en/function.is-executable.php)
     * The following tests if the current OS is Windows and if so, merely
     * checks if the folder is writable;
     * otherwise, it checks additionally for executable status (like before).
     *
     * @param string $directory The target directory to test access
     * @return bool
     */
    protected function isInaccessible($directory) {
        $isWin = $this->isWindows();
        $folderInaccessible = ($isWin) ? !is_writable($directory) : ( !is_writable($directory) && !is_executable($directory) );
        return $folderInaccessible;
    }

    /**
     * Determines is the OS is Windows or not
     *
     * @return boolean
     */

    protected function isWindows() {
        $isWin = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
        return $isWin;
    }


    /**
     * Трансформирует результат загрузки в файл
     * @param FineUploadResult $result
     * @return File
     */
    protected function ReturnResultToFile(FineUploadResult $result) {
        $file = new File();
        $file->filename = $result->uploadName;


        $file->path = $result->storedFilename;
        $file->uuid = $result->uuid;
        $file->document_id = null;

        return $file;
    }
}