<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 04.04.2017
 * Time: 19:57
 */

namespace App\ViewModels;


class Question
{
    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $correct;

    /**
     * @var array
     */
    public $variants;
}