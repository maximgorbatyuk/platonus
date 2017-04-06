<?php

/**
 * Неймспейс для ВьюМоделей, которые не участвуют в бд, однако играют роль посредника передачи данных во вьюхи
 */
namespace App\ViewModels;


use App\Traits\TestProcessingTrait;

/**
 * Class QuestionTest
 * Класс для репрезентации вопросов теста. Включает в себя вызов нужного вопроса, получение количества и прочее.
 *
 * @package App\ViewModels
 */
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