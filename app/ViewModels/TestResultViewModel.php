<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 10.04.2017
 * Time: 20:35
 */

namespace App\ViewModels;


use App\LogicModels\AnsweredQuestion;
use App\Models\Document;

class TestResultViewModel
{
    /** @var Document */
    public $document;

    /** @var int Кол-во вопросов */
    public $question_count;

    /** @var int Кол-во правильно отвеченных */
    public $correct_answers;

    /** @var AnsweredQuestion[] Отвеченные вопросы */
    public $user_answers;

    /** @var double Процент результат */
    public $percent;

    /** @var string Комментарий о тесте */
    public $comment;

    /**
     * Шаринг для сетей
     */


}