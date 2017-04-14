<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Auth;
use Illuminate\Http\Request;
use App\ViewModels\HomePageViewModel;
use Jenssegers\Agent\Agent;

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


    public function donate(Request $request){


        $referrer = $request->input('referrer');
        if ($referrer == 'yandex.money') {
            return view('front.donate.result');
        }
        $agent = new Agent();
        $mobile = $agent->isMobile();

        return view('front.donate.page', ['mobile' => $mobile]);
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
