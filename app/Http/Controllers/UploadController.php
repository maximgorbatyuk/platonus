<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\ViewModels\FineUploadResult;
use Illuminate\Http\Request;
use App\Traits\FileUploader;

class UploadController extends Controller
{
    use FileUploader;

    public function fineUpload (Request $request)
    {

        if (!is_null($request->input("done"))) {
            // Assumes you have a chunking.success.endpoint set to point here with a query parameter of "done".
            // For example: /myserver/handlers/endpoint.php?done
            $result = $this->combineChunks();
        }
        else {

            $result = $this->handleUpload($request);

            if ($result->success == true) {
                $file = $this->ReturnResultToFile($result);
                $saved = $file->save();
                if ($saved) {
                    $result->fileId = $file->id;

                } else {
                    $result->success = false;
                    $result->error = join("; ", $file->errors()->all());
                }
            }

        }
        return \Response::json($result);

    }

    public function fineUploadDelete(Request $request, $uuid) {

        $file = File::where('uuid', "=", $uuid);
        $deleted = $file->delete();

        $result = new FineUploadResult();
        $result->success = $deleted == true;
        $result->uuid = $uuid;
        return \Response::json($result);
    }
}
