<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\IndexController;
use App\Http\Controllers\Company\LoginController;
use App\Http\Controllers\Company\EmployeeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
'as'=>'company.'],function (){
    Route::get('/login',[LoginController::class, 'getLogin'])->name('login-page');
    Route::post('/send-login',[LoginController::class, 'postLogin'])->name('login');
    Route::get('/',[IndexController::class, 'index'])->name('index');

    Route::group(['middleware'=>'auth:company'],function () {
        Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
        Route::get('/home',[IndexController::class, 'home'])->name('home');
        Route::resource('employees', EmployeeController::class)->except(['destroy']);

    });
});
