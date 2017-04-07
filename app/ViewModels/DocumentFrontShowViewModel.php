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
}