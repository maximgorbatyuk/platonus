<?php

namespace App\ViewModels;

/**
 * Class Question
 * Класс, репрезентующий один вопрос теста
 *
 * @package App\ViewModels
 */
class Question
{
    /** @var string */
    private $content;


    /** @var string[] */
    private $variants;

    /** @var string */
    private $correct;

    function __construct(string $content, string $correct, array $variants)
    {
        $this->content = $content;
        $this->correct = $correct;
        $this->variants = $variants;
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
    public function getCorrect(): string
    {
        return $this->correct;
    }

    /**
     * @param string $correct
     */
    public function setCorrect(string $correct)
    {
        $this->correct = $correct;
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