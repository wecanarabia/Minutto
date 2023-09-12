<?php

namespace App\Http\Controllers\Company;

use App\Models\CompanyAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\LoginRequest;
use App\Http\Requests\Company\RegisterRequest;

class LoginController extends Controller
{
    public function getLogin(){
        return view('front.guest.login');
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

    public function getRegister(){
        return view('front.guest.register');
    }

    public function postRegister(RegisterRequest $request){

        $request['password']=bcrypt($request->password);
        $admin = CompanyAdmin::create($request->all());
        Auth::guard('company')->login($admin);
        if ($admin){
            return redirect()->route('company.home');
        }
        return redirect()->back()->withInput()->with(['error'=>__('messages.INVALID_CREDINTIALS')]);
       }
}
