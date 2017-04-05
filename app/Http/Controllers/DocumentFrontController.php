<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\VarDumper;
use App\Models\Document;
use App\Models\File;
use App\Models\TestSource;
use App\Traits\TestProcessingTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Traits\WordDocTrait;

class DocumentFrontController extends Controller
{

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
        $input = $request->input();
        $validator = \Validator::make($input, Document::$rules);


        if ($validator->fails()) {
            return Redirect::action('DocumentFrontController@create')
                ->withErrors($validator->errors())
                ->withInput($input);
        }

        $instance               = new Document();
        $instance->authorId     = $request->session()->getId();
        $instance->title        = Input::get('title');
        $instance->description  = Input::get('description');


        $uuid = Input::get('uuid');
        /** @var File $file */
        $file = File::where('uuid', "=", $uuid)->first();

        $instance->path = $file->path;
        $instance->filename = $file->filename;
        $instance->save();

        $file->document_id = $instance->id;

        $test = new TestSource();
        $test->processFileContent($file->getFileContent(), $instance->id);
        $saveResult = $test->save();

        $updateResult = $file->updateUniques();

        if ($updateResult == true && $saveResult == true)
        {
            flash("Данные сохранены!", Constants::Success);
        }
        else
        {
            $errors = join('<br>', $file->errors());
            flash("Не удалось обновить связанный файл <br>".$errors, Constants::Error);
        }
        return Redirect::action('DocumentFrontController@show', ["id" => $instance->id]);
    }


    public function show($id)
    {
        /** @var Document $instance */
        $instance = Document::find($id);


        if (!is_null($instance->test_source)) {
            $questions = $instance->test_source->GetTestQuestions();
            VarDumper::VarExport($questions);
        }



        return view('front.documents.show', [
            'instance' => $instance,
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
