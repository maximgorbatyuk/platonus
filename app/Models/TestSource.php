<?php

namespace App\Models;

use App\Traits\TestProcessingTrait;
use App\ViewModels\Question;
use LaravelArdent\Ardent\Ardent;
use Psy\Exception\ErrorException;

/**
 * App\Models\TestSource
 *
 * @property int $id
 * @property array $questions Вопросы
 * @property array $corrects Верные варианты ответа
 * @property string $vars_first Варианты 1 ответа
 * @property string $vars_second Варианты 2 ответа
 * @property string $vars_third Варианты 3 ответа
 * @property string $vars_forth Варианты 4 ответа
 * @property string $vars_fifth Варианты 5 ответа
 * @property string $document_id Связанный документ
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \Eloquent
 * @property-read \App\Models\Document $document
 */
class TestSource extends Ardent
{
    use TestProcessingTrait;

    /** @var Question[] $testQuestions Массив ВьюМоделей вопросов*/
    private $testQuestions = null;

    /**
     * Преобразует контент в массив вопросов. Инициирует поля. Обязателен к вызову после создания
     * @param $content
     * @param null $doc_id
     */
    public function processFileContent($content, $doc_id = null)
    {
        $this->testQuestions = $this->contentToQuestions($content);
        $this->questionsToFields($this->testQuestions);
        if (!is_null($doc_id)) {
            $this->document_id = $doc_id;
        }
    }

    /**
     * ВОзвращает массив вопросов
     * @return Question[]
     */
    public function GetTestQuestions() {

        if (is_null($this->testQuestions)) {
            $this->testQuestions = $this->fieldsToQuestions();
        }
        return $this->testQuestions;
    }

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

    /**
     * Вызывается перед сохранением
     * Делаю проверку на заполненность
     */
    public function beforeSave() {
        if (count($this->questions) == 0 ||
            count($this->corrects) == 0)
        {
            throw new ErrorException('Не проинициирован объект теста');
        }
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

    public function getVarsFirstAttribute($value)
    {
        return \GuzzleHttp\json_decode($value);
    }

    public function setVarsFirstAttribute($value)
    {
        $json = \GuzzleHttp\json_encode($value);
        $this->attributes['vars_first'] = $json;
    }

    public function getVarsSecondAttribute($value)
    {
        return \GuzzleHttp\json_decode($value);
    }

    public function setVarsSecondAttribute($value)
    {
        $json = \GuzzleHttp\json_encode($value);
        $this->attributes['vars_second'] = $json;
    }

    public function getVarsThirdAttribute($value)
    {
        return \GuzzleHttp\json_decode($value);
    }

    public function setVarsThirdAttribute($value)
    {
        $json = \GuzzleHttp\json_encode($value);
        $this->attributes['vars_third'] = $json;
    }

    public function getVarsForthAttribute($value)
    {
        return \GuzzleHttp\json_decode($value);
    }

    public function setVarsForthAttribute($value)
    {
        $json = \GuzzleHttp\json_encode($value);
        $this->attributes['vars_forth'] = $json;
    }

    public function getVarsFifthAttribute($value)
    {
        return \GuzzleHttp\json_decode($value);
    }

    public function setVarsFifthAttribute($value)
    {
        $json = \GuzzleHttp\json_encode($value);
        $this->attributes['vars_fifth'] = $json;
    }

    #endregion
}
