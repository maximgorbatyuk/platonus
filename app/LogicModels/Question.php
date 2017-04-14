<?php

namespace App\LogicModels;
use \Html;

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

    /** @var int Изначальный орядок вопроса в тесте */
    private $id = -1;

    /**
     * Question constructor.
     * @param int $index Порядок в тесте
     * @param string $content Вопрос
     * @param string $answer Правильный ответ
     * @param array $variants Массив вариантов ответа, включая правильный
     */
    function __construct(int $index, string $content, string $answer, array $variants)
    {
        $this->content = $content;
        $this->answer = $answer;
        $this->variants = $variants;
        $this->id = $index;
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
     * Возвращает айди как изначальный индекс порядка вопроса, даже если была совершена сортировка
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    #region Геттеры
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
     * @param bool $decode
     * @return string
     */
    public function getAnswer(bool $decode = false): string
    {
        $result = $this->answer;
        return $decode == true ? HTML::decode($result) : $result;
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

    #endregion


}