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
        $var1 = [];
        $var2 = [];
        $var3 = [];
        $var4 = [];
        $var5 = [];

        for($i = 0; $i < count($questions); $i++)
        {
            $questionsAttr[$i] = $questions[$i]->content;
            $corrects[$i] = $questions[$i]->correct;

            $var1[$i] = $questions[$i]->variants[0];
            $var2[$i] = $questions[$i]->variants[1];
            $var3[$i] = $questions[$i]->variants[2];
            $var4[$i] = $questions[$i]->variants[3];
            $var5[$i] = $questions[$i]->variants[4];

        }
        $this->questions = $questionsAttr;
        $this->corrects = $corrects;

        $this->vars_first = $var1;
        $this->vars_second = $var2;
        $this->vars_third = $var3;
        $this->vars_forth = $var4;
        $this->vars_fifth = $var5;
    }

    /**
     * ФОрмирует массив вопросов из полей
     * @return Question[]
     */
    protected function fieldsToQuestions() {
        $result = [];

        for($i = 0; $i < count($this->questions); $i++)
        {
            $question = new Question();
            $question->content = $this->questions[$i];
            $question->correct = $this->corrects[$i];

            $question->variants = [
                $this->vars_first[$i],
                $this->vars_second[$i],
                $this->vars_third[$i],
                $this->vars_forth[$i],
                $this->vars_fifth[$i]
            ];
            $result[$i] = $question;
        }
        return $result;
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