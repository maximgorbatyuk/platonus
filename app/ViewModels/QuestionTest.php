<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 06.04.2017
 * Time: 21:55
 */

namespace App\ViewModels;


use App\Traits\TestProcessingTrait;

class QuestionTest
{
    use TestProcessingTrait;

    /** @var Question[] $testQuestions Массив ВьюМоделей вопросов*/
    private $testQuestions;

    /** @var int $questionCount */
    private $questionCount = -1;

    function __construct($content)
    {
        $this->testQuestions = $this->contentToQuestions($content);
    }

    /**
     * ВОзвращает массив вопросов
     * @return Question[]
     */
    public function GetTestQuestions(): array
    {
        return $this->testQuestions;
    }

    /**
     * Возвращает количество вопросов
     * @return int
     */
    public function GetQuestionCount() : int
    {
        if ($this->questionCount == -1) {
            $this->questionCount = count($this->testQuestions);
        }
        return $this->questionCount;
    }
}