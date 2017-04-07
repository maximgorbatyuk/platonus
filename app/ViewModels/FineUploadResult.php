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
    /** @var bool Результат загрузки файла */
    public $success = false;

    /** @var string|null Текст сообщения ошибки, если таковая будет */
    public $error = null;

    /** @var string|null Имя загруженного файла */
    public $uploadName = null;

    /** @var string|null Имя файла, сохраненного на диске  */
    public $storedFilename = null;

    /** @var string|null Идентификатор файла */
    public $uuid = null;

    public $preventRetry = false;

    /** @var string/null Id файла в бд */
    public $fileId = null;

    /** @var int Количество вопросов */
    public $questionCount = 0;

    /** @var bool Результат удаления файла с диска */
    public $deleteResult = null;
}