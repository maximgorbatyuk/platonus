<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\VarDumper;
use App\Models\Document;
use App\Models\File;
use App\Models\TestSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class DocumentController extends Controller
{

    public function index()
    {
        $instances = Document::all();
        return view('admin.documents.index', ['instances'=>$instances]);
    }


    public function create()
    {
        return view('admin.documents.create');
    }


    public function store(Request $request)
    {
        $input = $request->input();
        $validator = \Validator::make($input, Document::$rules);


        if ($validator->fails()) {
            return Redirect::action('DocumentController@create')
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
        $updateResult = $file->updateUniques();

        if ($updateResult == true)
        {
            flash("Данные сохранены!", Constants::Success);
        }
        else
        {
            $errors = join('<br>', $file->errors());
            flash("Не удалось обновить связанный файл <br>".$errors, Constants::Error);
        }


        return Redirect::action('DocumentController@show', ["id" => $instance->id]);
    }

    public function show($id)
    {
        /** @var Document $document */
        $document = Document::find($id);
        $file = $document->file();
        return view('admin.documents.show', [
            'document'=>$document,
            'file' => $file
        ]);
    }

    public function edit($id)
    {
        $instance = Document::find($id);
        return view('admin.documents.edit', [
            'instance' => $instance
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        $validator = \Validator::make($input, Document::$rules);

        if ($validator->fails()) {
            return Redirect::action('DocumentController@edit', ["id" => $id])
                ->withErrors($validator->errors())
                ->withInput($input);
        }

        /** @var Document $instance */
        $instance = Document::find($id);
        $instance->authorId     = $request->session()->getId();
        $instance->title        = Input::get('title');
        $instance->description  = Input::get('description');
        $instance->path = Input::get('path');
        $instance->filename = Input::get('filename');

        $updateResult = $instance->updateUniques();
        if ($updateResult == true)
        {
            flash("Данные сохранены!", Constants::Success);
            return Redirect::action('DocumentController@show', ["id" => $instance->id]);
        }
        return Redirect::action('DocumentController@show', [
            "id" => $instance->id
        ])->withErrors($instance->errors())->withInput($input);
    }

    public function destroy($id)
    {
        /** @var Document $document */
        $document = Document::find($id);
        $document->delete();
        return Redirect::action('DocumentController@index')
            ->with('success', "Документ $id был удален");

    }
}
