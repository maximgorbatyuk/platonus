<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
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

        $currentQuestionId = $request->input('current_id');
        if (is_null($currentQuestionId))
        {
            // Если текущий вопрос null, значит тест только начался
            $test->shuffleQuestions(true);
            $q_order = [];
            $model->questions = $test->getQuestions();
            for ($i = 0; $i < count($model->questions); $i++)
            {
                $q_order[$i] = $model->questions[$i]->getId();
            }

            $model->current_question = $model->questions[0];
            $model->current_id = 0;
            $model->answered_questions = [];
            $model->answers = [];

        }
        else
        {

        }


        return view('front.test.question', ['model' => $model]);
    }

    public function result(Request $request, int $id)
    {
        return view('front.test.result');
    }

}
