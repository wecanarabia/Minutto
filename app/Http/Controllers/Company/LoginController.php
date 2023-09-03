<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\LoginRequest;

class LoginController extends Controller
{
    public function getLogin(){
        return view('company.guest.login');
    }
    public function postLogin(LoginRequest $request){

     $remember_me = $request->has('remember_me') ? true : false;
     if (auth()->guard('company')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember_me)){
         return redirect()->route('company.home');
     }
     return redirect()->back()->withInput()->with(['error'=>__('messages.INVALID_CREDINTIALS')]);
    }

    public function logout(){
        $guard=$this->getGuard();
        $guard->logout();
        return redirect()->route("company.login-page");
    }

    public function getGuard(){
        return auth('company');
    }
}
