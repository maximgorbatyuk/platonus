<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 07.04.2017
 * Time: 21:19
 */

namespace App\ViewModels;


use App\LogicModels\Question;
use App\LogicModels\QuestionTest;
use App\Models\Document;

class DocumentFrontShowViewModel
{
    /** @var  Document */
    public $document;

    /** @var  QuestionTest */
    public $test;

    /** @var  Question[] */
    public $questions;

    /**
     * Можно проиницировать объект сразу
     * DocumentFrontShowViewModel constructor.
     * @param Document|null $document Объект документа
     * @param QuestionTest|null $questionTest Объект теста
     * @param array|null $questions Список вопросов теста
     */
    function __construct(Document $document = null,
                        QuestionTest $questionTest = null,
                        array $questions = null
                    )
    {
        if (!is_null($document)) {
            $this->document = $document;
        }

        if (!is_null($questionTest)) {
            $this->test = $questionTest;
        }

        if (!is_null($questions)) {
            $this->questions = $questions;
        }

    }
}