<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DownloadController extends Controller
{
    public function document(Request $request, $id)
    {
        /** @var Document $document */
        $document = Document::find($id);

        $filename = $document->file->path;
        $file_path = storage_path('app') .DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$filename;
        if (file_exists($file_path))
        {
            // Send Download
            return \Response::download($file_path, $filename, [
                'Content-Length: '. filesize($file_path)
            ]);
        }
        throw new NotFoundHttpException('Файл '.$file_path.' документа '.$document->id.' не был найден');
    }
}
