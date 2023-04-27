<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class IndexController extends Controller
{
    public function home()
    {
        return view('front.index');
    }

    public function index()
    {
        return ;
    }

    public function locale(Request $request)
    {
        $lang = $request->locale;
        App::setLocale($lang);
        Session::put('locale', $lang);
        LaravelLocalization::setLocale($lang);
        $url = LaravelLocalization::getLocalizedURL(App::getLocale(), URL::previous());
        return Redirect::to($url);
    }
}
