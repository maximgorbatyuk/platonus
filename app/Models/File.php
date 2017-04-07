<?php

namespace App\Models;

use App\Traits\WordDocTrait;
use LaravelArdent\Ardent\Ardent;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $path Путь до загруженного файла uploads/*
 * @property string $filename Исходное название файла
 * @property string $uuid Уникальный идентификатор файла
 * @property string $document_id Связанный документ
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Document $document
 * @mixin \Eloquent
 */
class File extends Ardent
{
    use WordDocTrait;

    public static $relationsData = array(
        'document' => array(self::BELONGS_TO, 'Document'),
    );
    public static $rules = array(
        'uuid' => 'required|unique:files'
    );

    protected $table = 'files';

    /**
     * Возвращает документ, к которому привязан
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Document
     */
    public function document()
    {
        return $this->belongsTo('App\Models\Document');
    }

    /**
     * Удаление связанного файла в файловой системе.
     * @return bool
     */
    public function deleteStoredFile() : bool
    {
        $dir = $this->getFullFilename($this->path);
        return \File::delete($dir);
    }

    /**
     * Удаление инстанса со связанным файлом в файловой системе
     * @return bool|null
     */
    public function delete() : bool
    {
        //$this->deleteStoredFile();
        return parent::delete() && $this->deleteStoredFile();
    }

    public function UpdatedAt() : string
    {
        return $this->updated_at->format('d.m.Y');
    }

    /**
     * Получение контента файла
     * @return string
     */
    public function getFileContent() : string
    {
        $content = $this->readContent($this->path);
        return $content;
    }
}
