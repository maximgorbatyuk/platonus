<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 07.04.2017
 * Time: 23:23
 */

namespace App\LogicModels;


class AnsweredQuestion
{
    /** @var string Контент вопроса */
    public $content;

    /** @var string Правильный ответ */
    public $answer;

    /** @var string Ответ, выбранный юзером */
    public $answered;

    /** @var bool Правильный вариант ответа */
    public $isCorrect = false;
}