<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 09.04.2017
 * Time: 9:03
 */

namespace App\ViewModels;


use App\LogicModels\Question;
use App\Models\Document;

class TestQuestionViewModel
{
    /** @var  Document Документ вопросов */
    public $document;

    /** @var int Номер текущего вопроса */
    public $current_id;

    /** @var Question[] Массив вопросов в том порядке и кол-ве, в котором их нужно выводить */
    public $questions;

    /** @var Question Текущий вопрос */
    public $current_question;

    /** @var int Устанровленый лимит вопросов */
    public $limit = 25;

    /** @var bool Есть ли кнопка "Показать верный" */
    public $could_see_correct = true;

    /** @var array Массив айдишников вопросов по рандомному порядку */
    public $question_order = [];

    /** @var array Массив айдишников, на который юзер ответил */
    public $answered_questions = [];

    /** @var array Массив ответов юзера на вопросы */
    public $answers = [];
}