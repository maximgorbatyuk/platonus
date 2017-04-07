<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 06.04.2017
 * Time: 23:03
 */

namespace App\Traits;

use App\Models\Document;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Psy\Exception\ErrorException;

trait DocumentTrait
{

    protected function getValidator(Request $request) : Validator
    {
        $input = $request->input();
        $validator = \Validator::make($input, Document::$rules);
        return $validator;
    }

    /**
     * @param Request $request
     * @return Document|null
     */
    protected function getCreatedDocument(Request $request)
    {
        $uuid = $request->input('uuid');
        $file = $this->getFile($uuid);

        if (is_null($file)) {
            return null;
        }
        $document = $this->constructDocument($request, $file);
        $saveResult = $document->save();
        if ($saveResult == false)
        {
            return null;
        }

        $file->document_id = $document->id;
        $file->updateUniques();
        return $document;
    }

    /**
     * @param string $id
     * @param Request $request
     * @return Document|null
     */
    protected function getUpdatedDocument(string $id, Request $request) : Document
    {
        $uuid = $request->input('uuid');
        $file = $this->getFile($uuid);

        $document = $this->constructDocument($request, $file, $id);
        $saveResult = $document->save();

        if ($saveResult == false)
        {
            return null;
        }
        return $document;
    }

    protected function constructDocument(Request $request, File $file, string $id = null)  : Document
    {
        $document = is_null($id) ? new Document() : Document::find($id);
        $document->authorId     = $request->session()->getId();;
        $document->title        = $request->input('title') ?? $file->filename;
        $document->description  = $request->input('description') ?? null;
        $document->path         = $file->path;
        $document->filename     = $file->filename;
        return $document;
    }

    /**
     * @param string $uuid
     * @return File|null
     */
    protected function getFile(string $uuid)
    {
        $file = File::where('uuid', "=", $uuid)->first();
        return $file;
    }
}