<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 02.04.2017
 * Time: 14:42
 */

namespace App\ViewModels;

/**
 * Class FineUploadResult
 * @package ViewModels
 *
 * Аналог ВьюМодели из c#.
 * Используется в загрузчике файлов
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