<?php

namespace App\Models;

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
    public static $relationsData = array(
        'document' => array(self::BELONGS_TO, 'Document'),
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
}
