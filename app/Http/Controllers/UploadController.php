<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FileUploader;
use UploadHandler;

class UploadController extends Controller
{
    use FileUploader;

    public function fineUpload (Request $request)
    {
        $this->InitRequest($request);

        if (!is_null($request->input("done"))) {
            // Assumes you have a chunking.success.endpoint set to point here with a query parameter of "done".
            // For example: /myserver/handlers/endpoint.php?done
            $result = $this->combineChunks();
        }
        else {

            $result = $this->handleUpload();
        }
        return \Response::json($result);

    }

    public function fineUploadDelete(Request $request, $fileName) {
        $this->InitRequest($request);
        return \Response::json($fileName);
    }
}
