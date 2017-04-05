<?php

namespace App\Models;

use LaravelArdent\Ardent\Ardent;

/**
 * App\Models\TestSource
 *
 * @property int $id
 * @property string $questions Вопросы
 * @property string $corrects Верные варианты ответа
 * @property string $variant_arrays Варианты ответа
 * @property string $document_id Связанный документ
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \Eloquent
 */
class TestSource extends Ardent
{
    public static $relationsData = array(
        'document' => array(self::BELONGS_TO, 'Document'),
    );

    protected $table = 'test_sources';

    /**
     * Возвращает документ, к которому привязан
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Document
     */
    public function document()
    {
        return $this->belongsTo('App\Models\Document');
    }

    public function UpdatedAt() {
        return $this->updated_at->format('d.m.Y');
    }

    #region Accessors / Mutators

    public function getQuestionsAttribute($value)
    {
        return \GuzzleHttp\json_decode($value);
    }

    public function setQuestionsAttribute($value)
    {
        $json = \GuzzleHttp\json_encode($value);
        $this->attributes['questions'] = $json;
    }

    public function getCorrectsAttribute($value)
    {
        return \GuzzleHttp\json_decode($value);
    }

    public function setCorrectsAttribute($value)
    {
        $json = \GuzzleHttp\json_encode($value);
        $this->attributes['corrects'] = $json;
    }

    public function getVariantArraysAttribute($value)
    {
        return \GuzzleHttp\json_decode($value);
    }

    public function setVariantArraysAttribute($value)
    {
        $json = \GuzzleHttp\json_encode($value);
        $this->attributes['variant_arrays'] = $json;
    }

    #endregion
}
