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
    /**
     * @param Question[] $questions
     */
    protected function questionsToFields($questions) {
        $questionsAttr = [];
        $corrects = [];
        $variant_arrays = [];

        for($i = 0; $i < count($questions); $i++)
        {
            $questionsAttr[$i] = $questions[$i]->content;
            $corrects[$i] = $questions[$i]->correct;
            $variant_arrays[$i] = $questions[$i]->variants;

        }
        $this->questions = $questionsAttr;
        $this->corrects = $corrects;
        $this->variant_arrays = $variant_arrays;
    }

    /**
     * @param $fileContent
     * @return Question[]
     */
    protected function contentToQuestions($fileContent) {

        $result = [];
        $questionSplit = $this->splitContentByQuestions($fileContent);
        foreach ($questionSplit as $item) {

            $qSource = $this->getQuestionSource($item);

            if (count($qSource) < 3) continue;
            $result[] = $this->convertSourceToQuestion($qSource);
        }
        return $result;
    }


    /**
     * @param $content
     * @return array
     */
    protected function splitContentByQuestions($content)
    {
        $delimiter = '&lt;question&gt;';
        $array = explode($delimiter, $content);
        return $array;
    }

    /**
     * @param $content
     * @return array
     */
    protected function getQuestionSource($content)
    {
        $delimiter = '&lt;variant&gt;';
        $array = explode($delimiter, $content);
        return $array;
    }

    /**
     * @param array $questionSource
     * @return Question
     */
    protected function convertSourceToQuestion(array $questionSource)
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