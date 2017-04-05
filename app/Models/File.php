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

    public function deleteStoredFile()
    {
        $storageDir = join(DIRECTORY_SEPARATOR, [storage_path(), 'app']);
    }

    public function UpdatedAt() {
        return $this->updated_at->format('d.m.Y');
    }

    public function getFileContent() {

    }
}
