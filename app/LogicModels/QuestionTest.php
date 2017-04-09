<?php

namespace App\LogicModels;


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

    /** @var Question[] $questions Массив ВьюМоделей вопросов*/
    private $questions;

    /** @var int $questionCount */
    private $questionCount = -1;

    function __construct($content)
    {
        $this->questions = $this->contentToQuestions($content);
        if (count($this->questions) == 0) {
            $this->error = "В файле не распознано вопросов";
        }
    }

    /**
     * ВОзвращает массив вопросов
     * @return Question[]
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /**
     * Возвращает вопрос на указанном индексе, начиная с нуля. Null, если индекс вне диапазона значений
     * @param int $index
     * @return Question|null
     */
    public function getQuestion(int $index)
    {
        if ($index < 0 || $index > count($this->questions)) {
            return null;
        }
        return $this->questions[$index];
    }

    /**
     * Возвращает вопрос по указанному индексу изначального порядка. Null, если индекс вне диапазона значений
     * @param int $orderIndex
     * @return Question|null
     */
    public function getQuestionByOrder(int $orderIndex)
    {
        $result = null;
        for($i = 0; $i < count($this->questions);$i++) {
            if ($this->questions[$i]->getId() != $orderIndex) continue;

            $result = $this->questions[$i];
            break;
        }
        return $result;
    }

    /**
     * Перемешка вариантов ответа. Можно указать, чтобы перемешались и вариаты ответа
     * @param bool $withVars
     * @return bool
     */
    public function shuffleQuestions(bool $withVars = true) : bool
    {
        $res = shuffle($this->questions);
        if ($withVars == true) {
            foreach ($this->questions as $question) {
                $res = $res && $question->shuffleVariants();
            }
        }
        return $res;
    }

    /**
     * Возвращает количество вопросов
     * @return int
     */
    public function getQuestionCount() : int
    {
        if ($this->questionCount == -1) {
            $this->questionCount = count($this->questions);
        }
        return $this->questionCount;
    }

    /**
     * Если есть ошибки в файле, то вернет строку. Иначе null
     * @return string|null
     */
    public function getError() {
        return $this->error;
    }
}