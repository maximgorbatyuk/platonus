<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Models\Document;
use App\Traits\DocumentTrait;
use Illuminate\Http\Request;
use Redirect;

class DocumentController extends Controller
{
    // TODO отрефакторить редиректы и валидацию. По сути, нет необходимости в выводе формы. Да и вообще полей title и desc в форме сохжания

    use DocumentTrait;

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

        $validator = $this->getValidator($request);

        if ($validator->fails()) {
            return Redirect::action('DocumentController@create')
                ->withErrors($validator->errors())
                ->withInput($request->input());
        }

        $document = $this->getCreatedDocument($request);
        if (is_null($document))
        {
            return Redirect::action('DocumentController@create',
                [ "id" => $document->id ])
                ->withErrors($document->errors())
                ->withInput($request->input());
        }

        flash("Данные сохранены!", Constants::Success);
        return Redirect::action('DocumentController@show', ["id" => $document->id]);
    }

    public function show($id)
    {
        /** @var Document $document */
        $document = Document::find($id);
        $file = $document->file;
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
        $validator = $this->getValidator($request);

        if ($validator->fails()) {
            return Redirect::action('DocumentController@edit', ["id" => $id])
                ->withErrors($validator->errors())
                ->withInput($input);
        }

        $document = $this->getUpdatedDocument($id, $request);
        if (!is_null($document))
        {
            return Redirect::action('DocumentController@edit',
                [ "id" => $document->id ]);
        }

        flash("Данные сохранены!", Constants::Success);
        return Redirect::action('DocumentController@show', ["id" => $document->id]);
    }

    public function destroy($id)
    {
        /** @var Document $document */
        $document = Document::find($id);
        $document->delete();
        return Redirect::action('DocumentController@index')
            ->with('success', "Документ $id был удален");
    }

    public function destroyAllDocuments(){

        /** @var Document[] $documents */
        $documents = Document::where('id', '>=', 5)->get();
        $result = [];
        foreach ($documents as $document) {
            $id = $document->id;
            $title = $document->title;

            $del = $document->delete();
            $result[] = [
                'id' => $id,
                'title' => $title,
                'del' => $del
            ];
        }
        return \Response::json($result);
    }
}
