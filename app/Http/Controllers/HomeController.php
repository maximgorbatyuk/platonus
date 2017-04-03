<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('front.home');
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
