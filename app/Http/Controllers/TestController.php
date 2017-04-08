<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Открывает страницу, принимая и гет, и пост-параметры
     * @param Request $request
     * @param int $id Айди документа, который открывается для тестирования
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function openTest(Request $request, int $id)
    {
        $method = $request->method();
        if ($method == "GET") {
            return view('front.documents.create');
        }
    }
}
