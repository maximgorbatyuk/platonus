<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\VarDumper;
use App\LogicModels\Question;
use App\LogicModels\QuestionTest;
use App\Models\Document;
use App\ViewModels\DocumentFrontShowViewModel;
use App\ViewModels\TestQuestionViewModel;
use Carbon\Carbon;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Cookie;

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
        $model->display_correct = $request->input('display_correct');
        $model->limit = $request->input('limit');

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

            $model->answered_questions[$model->current_pos] =$model->questions[$model->current_pos]->getId();
            $model->answers[$model->current_pos] = $request->input('answer');

            $model->current_pos = $model->current_pos + 1;

            $model->current_question = $model->questions[$model->current_pos];

            $model->limit = intval($request->input('limit'));
            $model->display_correct = intval($request->input('display_correct'));
            $model->question_count = count($model->questions);
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
        VarDumper::VarExport($request->input());
        return view('front.test.result');
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
