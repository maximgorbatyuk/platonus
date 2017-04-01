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
 */
class Document extends Ardent
{
    protected $table = 'documents';

}
