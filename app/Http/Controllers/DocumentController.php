<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Models\Document;
use Helpers\VarDumper;
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

        VarDumper::VarExport($request);

        if ($validator->fails()) {
            return Redirect::action('DocumentController@create')
                ->withErrors($validator)
                ->withInput($input);
        }



        $instance = new Document();
        $instance->authorId = $request->session()->getId();
        $instance->title = Input::get('title');
        $instance->description = Input::get('description');


        $instance->save();
        flash("Данные сохранены!", Constants::Success);
        return Redirect::action('DocumentController@show', ["id" => $instance->id])
            ->with('success', 'Данные сохранены');
    }

    public function show($id)
    {
        $instance = Document::find($id);
        return view('admin.documents.show', ['instance'=>$instance]);
    }

    public function edit($id)
    {
        $instance = Document::find($id);
        return view('admin.documents.edit', ['instance'=>$instance]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
