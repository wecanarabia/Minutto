<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\IndexController;
use App\Http\Controllers\Company\LoginController;
use App\Http\Controllers\Company\BranchController;
use App\Http\Controllers\Company\EmployeeController;
use App\Http\Controllers\Company\DepartmentController;


Route::group(['prefix' => Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
'as'=>'company.'],function (){
    Route::get('/login',[LoginController::class, 'getLogin'])->name('login-page');
    Route::post('/send-login',[LoginController::class, 'postLogin'])->name('login');
    Route::get('/',[IndexController::class, 'index'])->name('index');

    Route::group(['middleware'=>'auth:company'],function () {
        Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
        Route::get('/home',[IndexController::class, 'home'])->name('home');
        Route::resource('employees', EmployeeController::class)->except(['destroy','edit','update','create','store']);
        Route::post('employees/update/{id}',[EmployeeController::class,'updateData']);
        Route::resource('departments', DepartmentController::class)->except(['destroy']);
        Route::resource('branches', BranchController::class)->except(['destroy']);

    });
});
