<?php

namespace App\ViewModels;

/**
 * Class FineUploadResult
 * @package ViewModels
 *
 * Аналог ВьюМодели из c#.
 * Используется в загрузчике файлов для того, чтобы быть преобразованным в json
 */
class FineUploadResult
{
    public $success = false;

    public $error = null;

    public $uploadName = null;

    public $storedFilename = null;

    public $uuid = null;

    public $preventRetry = false;

    public $fileId = null;
}