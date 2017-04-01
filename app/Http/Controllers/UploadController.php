<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function fineUpload (Request $request)
    {
        $files = $request->files;
        $count = $files->count();

    }
}
