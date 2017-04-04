<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 04.04.2017
 * Time: 19:44
 */

namespace App\Traits;


use App\ViewModels\Question;

trait TestProcessingTrait
{
    protected function GetTest($fileContent) {

        $result = [];
        $questionSplit = $this->splitContentByQuestions($fileContent);
        foreach ($questionSplit as $item) {

            $qSource = $this->getQuestionSource($item);

            if (count($qSource) < 3) continue;
            $result[] = $this->ConvertSourceToQuestion($qSource);
        }
        return $result;
    }


    protected function splitContentByQuestions($content)
    {
        $delimiter = '&lt;question&gt;';
        $array = explode($delimiter, $content);
        return $array;
    }

    protected function getQuestionSource($content)
    {
        $delimiter = '&lt;variant&gt;';
        $array = explode($delimiter, $content);
        return $array;
    }

    protected function ConvertSourceToQuestion(array $questionSource)
    {
        $content = $questionSource[0];
        $correct = $questionSource[1];
        $vars = [];
        for ($i = 1; $i < count($questionSource);$i++) {
            $vars[] = $questionSource[$i];
        }

        $result = new Question();
        $result->content = $content;
        $result->correct = $correct;
        $result->variants = $vars;
        return $result;
    }
}