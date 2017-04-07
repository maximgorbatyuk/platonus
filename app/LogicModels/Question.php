<?php

namespace App\LogicModels;

/**
 * Class Question
 * Класс, репрезентующий один вопрос теста
 *
 * @package App\ViewModels
 */
class Question
{
    /** @var string Контент вопроса */
    private $content;


    /** @var string[] Варианты ответа, куда включен и правильный */
    private $variants;

    /** @var string Правильный ответ */
    private $answer;

    function __construct(string $content, string $correct, array $variants)
    {
        $this->content = $content;
        $this->answer = $correct;
        $this->variants = $variants;
    }

    /**
     * Перемешка вариантов ответа
     * @return bool
     */
    public function shuffleVariants() : bool
    {
        return shuffle($this->variants);
    }

    /**
     * Получение контента
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer(string $answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return \string[]
     */
    public function getVariants(): array
    {
        return $this->variants;
    }

    /**
     * @param \string[] $variants
     */
    public function setVariants(array $variants)
    {
        $this->variants = $variants;
    }


}