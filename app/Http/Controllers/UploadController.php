<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\ViewModels\FineUploadResult;
use App\LogicModels\QuestionTest;
use Illuminate\Http\Request;
use App\Traits\FileUploader;

class UploadController extends Controller
{
    use FileUploader;

    public function fineUpload (Request $request)
    {

        $result = $this->handleUpload($request);

        if ($result->success == false)
        {
            return \Response::json($result);
        }

        $file = $this->ReturnResultToFile($result);

        $fileContent = $file->getFileContent();
        $test = new QuestionTest($fileContent);

        if (!is_null($test->getError()))
        {
            $result->success = false;
            $result->error = $test->getError();
            $result->questionCount = $test->getQuestionCount();

            $result->deleteResult = $file->deleteStoredFile();

            return \Response::json($result);
        }

        $saved = $file->save();
        if ($saved == false) {
            $result->success = false;
            $result->error = join("; ", $file->errors()->all());
            $result->fileId = $file->id;
            return \Response::json($result);
        }
        $result->fileId = $file->id;
        return \Response::json($result);

    }

    public function fineUploadDelete(Request $request, $uuid) {

        $file = File::where('uuid', "=", $uuid)->first();

        $dir = 'uploads'.DIRECTORY_SEPARATOR.$file->path;
        $deleteResult = \File::delete($dir);

        $deleted = $file->delete();

        $result = new FineUploadResult();
        $result->success = $deleted == true;
        $result->uuid = $uuid;
        return \Response::json($result);
    }
}
