<?php

namespace App\Models;

use LaravelArdent\Ardent\Ardent;

/**
 * App\Models\Document
 *
 * @property int $id
 * @property string $title Название файла
 * @property string $authorId Айди сессии автора
 * @property string $filename Краткое имя файла
 * @property string $path Полный путь до файла
 * @property string $description Описание файла
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \Eloquent
 * @property-read \App\Models\File $file
 */
class Document extends Ardent
{
    public static $relationsData = array(
        'document' => array(self::HAS_ONE, 'File'),
    );

    protected $table = 'documents';

    /**
     * Возвращает связанный файл при загрузке
     * @return \Illuminate\Database\Eloquent\Relations\HasOne | File
     */
    public function file()
    {
        return $this->hasOne('App\Models\File');
    }

    public function UpdatedAt() {
        return $this->updated_at->format('d.m.Y');
    }

}
