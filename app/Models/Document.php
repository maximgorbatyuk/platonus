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
 * @property int $views Описание файла
 * @property int question_count Кол-во вопросов
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \Eloquent
 * @property-read \App\Models\File $file
 */
class Document extends Ardent
{
    public static $relationsData = array(
        'file' => array(self::HAS_ONE, 'File'),
        'test_source' => array(self::HAS_ONE, 'TestSource'),
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

    public function CreatedAt() {
        return $this->created_at->format('d.m.Y');
    }


    /**
     * Удаление инстанса со связанным файлом в файловой системе и в БД
     * @return bool|null
     */
    public function delete()
    {
        $this->file->delete();
        return parent::delete();
    }

    public static function getTop(int $limit){

        $rows = \DB::table('documents')
            ->select()
            ->orderByDesc('views')
            ->limit($limit)
            ->get();

        return $rows;
    }

}
