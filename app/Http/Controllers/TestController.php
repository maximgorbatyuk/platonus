<?php

namespace App\Http\Controllers;

use App\Helpers\Cheer;
use App\Helpers\Constants;
use App\Helpers\Swears;
use App\Helpers\VarDumper;
use App\LogicModels\AnsweredQuestion;
use App\LogicModels\Question;
use App\LogicModels\QuestionTest;
use App\Models\Document;
use App\ViewModels\DocumentFrontShowViewModel;
use App\ViewModels\TestQuestionViewModel;
use App\ViewModels\TestResultViewModel;
use Illuminate\Http\Request;

class TestController extends Controller
{

    /**
     * Открывает страницу, принимая и гет, и пост-параметры
     * @param Request $request
     * @param int $id Айди документа, который открывается для тестирования
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function start(Request $request, int $id)
    {
        /** @var Document $document */
        $document = Document::find($id);
        $test = new QuestionTest($document->file->getFileContent());
        $questions = $test->getQuestions();

        $model = new DocumentFrontShowViewModel($document, $test, $questions);

        return view('front.test.start', ['model' => $model]);
    }

    public function question(Request $request)
    {
        $doc_id = $request->input('document_id');
        if (is_null($doc_id)) {
            flash('Документ-то не найден '.Constants::NotFoundSmile.'. Выбери еще раз', Constants::Warning);
            return \Redirect::action('DocumentFrontController@index');
        }
        /** @var Document $document */
        $document = Document::find($doc_id);
        $test = new QuestionTest($document->file->getFileContent());

        $model = new TestQuestionViewModel();

        $model->document = $document;
        $model->display_correct = filter_var($request->input('display_correct') , FILTER_VALIDATE_BOOLEAN);
        $model->show_swears     = filter_var($request->input('show_correct') , FILTER_VALIDATE_BOOLEAN);
        $model->limit           = filter_var($request->input('limit') , FILTER_VALIDATE_BOOLEAN);

        $current_pos = $request->input('current_pos');
        if (is_null($current_pos))
        {
            // Если текущий вопрос null, значит тест только начался
            $test->shuffleQuestions(true);
            $q_order = [];
            $model->questions = $test->getQuestions();
            for ($i = 0; $i < count($model->questions); $i++)
            {
                $q_order[$i] = $model->questions[$i]->getId();
            }
            $model->question_order = $q_order;
            $model->current_pos = 0;
            $model->current_question = $model->questions[$model->current_pos];
            $model->answered_questions = [];
            $model->answers = [];
            $model->question_count = count($model->questions);
            $model->progress_value = 0;
        }
        else
        {
            $model->question_order = \GuzzleHttp\json_decode($request->input('question_order'));
            $model->questions = $this->getQuestionsInOrder($test, $model->question_order);

            $model->answered_questions = \GuzzleHttp\json_decode($request->input('answered_questions'));
            $model->answers = \GuzzleHttp\json_decode($request->input('answers'));

            $model->current_pos = intval($request->input('current_pos'));

            $model->answered_questions[$model->current_pos] = $model->questions[$model->current_pos]->getId();
            $model->answers[$model->current_pos] = $request->input('answer');



            $model->question_count = count($model->questions);

            if ($model->current_pos == $model->question_count - 1) {
                // Если был принят последний вопрос
                $model->progress_value = 100;
                $model->is_last = true;
                session(['model' => $model]);
                return \Redirect::action('TestController@result');
            }

            $model->current_pos = $model->current_pos + 1;
            $model->current_question = $model->questions[$model->current_pos];
            $model->current_question->shuffleVariants();
            $model->progress_value = intval(($model->current_pos / $model->question_count) * 100);

            if ($model->current_pos == $model->question_count - 1) {
                $model->progress_value = 100;
                $model->is_last = true;
            }
            //VarDumper::VarExport($model);
        }


        return view('front.test.question', ['model' => $model]);
    }

    public function result(Request $request)
    {
        /** @var TestQuestionViewModel $model */
        $model = $request->session()->get('model');
        if (is_null($model)) {
            flash('Произошла ошибка при сохранении вопросов '.Constants::NotFoundSmile.
                '. Начни, пожалуйста, снова и не расстраивайся, сервис развивается, всякое бывает',
                Constants::Warning);
            return \Redirect::action('TestController@start');
        }



        $resultModel = new TestResultViewModel();
        $resultModel->document = $model->document;
        $resultModel->question_count = $model->question_count;

        $correctAnswersCount = 0;
        $answeredQuestions = [];
        for($i = 0; $i < count($model->answered_questions);$i++)
        {

            $id = $model->answered_questions[$i];
            $question = $model->questions[$i];

            $answeredQuestion = new AnsweredQuestion();
            $answeredQuestion->content = $question->getContent();
            $answeredQuestion->answer = $question->getAnswer();
            $answeredQuestion->answered = $model->answers[$i];
            $answeredQuestion->isCorrect = trim($answeredQuestion->answered) == trim($answeredQuestion->answer);

            if ($answeredQuestion->isCorrect) {
                $correctAnswersCount++;
            }
            $answeredQuestions[$i] = $answeredQuestion;
        }


        $resultModel->correct_answers = $correctAnswersCount;
        $resultModel->percent = ($correctAnswersCount / $resultModel->question_count) * 100;
        $resultModel->comment = $model->show_swears ? Swears::getComment($resultModel->percent) : Cheer::getComment($resultModel->percent);
        $resultModel->user_answers = $answeredQuestions;
        //VarDumper::VarExport($model);

        return view('front.test.result', ['model' => $resultModel]);
    }

    /**
     * @param QuestionTest $test
     * @param array $order
     * @return Question[]
     */
    private function getQuestionsInOrder(QuestionTest $test, array $order) : array
    {
        $result = [];
        for($i = 0; $i < count($order); $i++)
        {
            $result[$i] = $test->getQuestion($order[$i]);
        }
        return $result;

    }

}
