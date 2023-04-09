<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;

Route::group(['prefix'=>'admin'],function (){
    Route::get('/login',[AdminLoginController::class, 'getLogin'])->name('admin.login-page');
    Route::post('/send-login',[AdminLoginController::class, 'postLogin'])->name('admin.login');

    Route::group(['middleware'=>'auth:admin'],function () {
        Route::get('/logout',[AdminLoginController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');

    });
});
