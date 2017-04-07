<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Models\Document;
use App\LogicModels\QuestionTest;
use Illuminate\Http\Request;
use Redirect;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Traits\DocumentTrait;

class DocumentFrontController extends Controller
{

    use DocumentTrait;

    public function index()
    {
        $instances = Document::all();
        return view('front.documents.index', ['instances' => $instances]);
    }


    public function create()
    {
        return view('front.documents.create');
    }


    public function store(Request $request)
    {
        if (is_null($request->input('uuid'))) {
            return Redirect::action('HomeController@index');
        }

        $validator = $this->getValidator($request);

        if ($validator->fails()) {

            return Redirect::action('DocumentFrontController@create')
                ->withErrors($validator->errors())
                ->withInput($request->input());
        }

        $document = $this->getCreatedDocument($request);
        if (is_null($document))
        {
            $uuid = $request->input('uuid');
            $file = $this->getFile($uuid);
            $file->delete();
            flash()->overlay('Документ не был сохранен. Попробуй снова');
            return Redirect::action('DocumentFrontController@index');
        }

        flash("Данные сохранены!", Constants::Success);
        return Redirect::action('DocumentFrontController@show', ["id" => $document->id]);
    }


    public function show($id)
    {
        /** @var Document $instance */
        $instance = Document::find($id);
        $questionTest = new QuestionTest($instance->file->getFileContent());
        $questions = $questionTest->getTestQuestions();
        $export = var_export($questions, true);

        return view('front.documents.show', [
            'instance' => $instance,
            'questions' => $questions,
            'export' => $export
        ]);
    }

    public function edit($id)
    {
        throw new NotFoundHttpException();
    }

    public function update(Request $request, $id)
    {
        throw new NotFoundHttpException();
    }

    public function destroy($id)
    {
        throw new NotFoundHttpException();
    }
}
