<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Auth;
use Illuminate\Http\Request;
use App\ViewModels\HomePageViewModel;

class HomeController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $model = new HomePageViewModel();
        $model->documents = Document::getTop(6);
        return view('front.home', ['model' => $model]);
    }


    public function donate(){
        return view('front.donate');
    }

    public function about(){
        return view('front.about');
    }

    #region Errors

    public function error404() {
        return view('errors.404');
    }

    public function error500() {
        return view('errors.500');
    }

    public function error503() {
        return view('errors.503');
    }

    #endregion
}
