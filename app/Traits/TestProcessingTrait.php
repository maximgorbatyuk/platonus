<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 04.04.2017
 * Time: 19:44
 */

namespace App\Traits;


use App\LogicModels\Question;

trait TestProcessingTrait
{

    /** @var string Записанная ошибка, если парсинг документа не удался */
    protected $error;

    /**
     * @param $fileContent
     * @return Question[]
     */
    protected function contentToQuestions($fileContent) : array {

        $result = [];
        $questionSplit = $this->splitContentByQuestions($fileContent);
        $index = 0;

        for($i = 0; $i < count($questionSplit); $i++)
        {
            $item = $questionSplit[$i];
            $qSource = $this->getQuestionSource($item);

            if (count($qSource) < 3) continue;
            $result[] = $this->convertSourceToQuestion($index, $qSource);
            $index++;
        }

        return $result;
    }


    /**
     * @param $content
     * @return array
     */
    protected function splitContentByQuestions($content) : array
    {
        $delimiter = '&lt;question&gt;';
        $array = explode($delimiter, $content);
        return $array;
    }

    /**
     * @param $content
     * @return array
     */
    protected function getQuestionSource($content) : array
    {
        $delimiter = '&lt;variant&gt;';
        $array = explode($delimiter, $content);
        return $array;
    }

    /**
     * @param int $index
     * @param array $questionSource
     * @return Question
     */
    protected function convertSourceToQuestion(int $index, array $questionSource) : Question
    {
        $content = trim($questionSource[0]);
        $correct = trim($questionSource[1]);
        $vars = [];
        for ($i = 1; $i < 6;$i++) {
            $variant = $questionSource[$i] ?? "[Вариант $i потерялся]";
            $vars[] = trim($variant);
        }

        $result = new Question($index, $content, $correct, $vars);
        return $result;
    }
}