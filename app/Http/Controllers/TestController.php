<?php

namespace App\Http\Controllers;

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
        $model = new TestQuestionViewModel();
        $doc = $request->input('document_id');

        return view('front.test.question');
    }

    public function result(Request $request, int $id)
    {
        return view('front.test.result');
    }

}
