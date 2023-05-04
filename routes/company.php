<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\IndexController;
use App\Http\Controllers\Company\LeaveController;
use App\Http\Controllers\Company\LoginController;
use App\Http\Controllers\Company\ShiftController;
use App\Http\Controllers\Company\BranchController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\WorkDayController;
use App\Http\Controllers\Company\EmployeeController;
use App\Http\Controllers\Company\LeaveTypeController;
use App\Http\Controllers\Company\AttendanceController;
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
        Route::resource('company-settings', CompanyController::class)->except(['destroy','index','show','edit','update']);
        Route::get('company-settings/main-branch/create', [CompanyController::class,'createBranch'])->name('company-settings.branch.create');
        Route::post('company-settings/main-branch/store', [CompanyController::class,'storeBranch'])->name('company-settings.branch.store');
        Route::get('company-settings/main-shift/create', [CompanyController::class,'createShift'])->name('company-settings.shift.create');
        Route::post('company-settings/main-shift/store', [CompanyController::class,'storeShift'])->name('company-settings.shift.store');
        Route::get('company-settings/department/create', [CompanyController::class,'createDepartment'])->name('company-settings.department.create');
        Route::post('company-settings/department/store', [CompanyController::class,'storeDepartment'])->name('company-settings.department.store');
        Route::get('company-settings/shift-workdays/create', [CompanyController::class,'createWorkdays'])->name('company-settings.shift-workdays.create');
        Route::post('company-settings/shift-workdays/store', [CompanyController::class,'storeWorkdays'])->name('company-settings.shift-workdays.store');
        Route::get('company-settings/show', [CompanyController::class,'show'])->name('company-settings.show');
        Route::get('company-settings/edit', [CompanyController::class,'edit'])->name('company-settings.edit');
        Route::put('company-settings/update', [CompanyController::class,'update'])->name('company-settings.update');

        Route::group(['middleware'=>['CheckCompany','timezone']],function () {
            Route::resource('employees', EmployeeController::class)->except(['destroy','edit','update','create','store']);
            Route::post('employees/update/{id}',[EmployeeController::class,'updateData']);
            Route::resource('departments', DepartmentController::class)->except(['destroy']);
            Route::resource('branches', BranchController::class)->except(['destroy']);
            Route::resource('shifts', ShiftController::class)->except(['destroy']);
            Route::resource('leave-types', LeaveTypeController::class)->except(['destroy']);
            Route::resource('workdays', WorkDayController::class)->except(['destroy']);
            Route::get('shifts/workdays/{id}/edit', [WorkDayController::class,'editShiftWorkdays'])->name('shifts.workdays.edit');
            Route::put('shifts/workdays/{id}/update', [WorkDayController::class,'updateShiftWorkdays'])->name('shifts.workdays.update');
            Route::get('attendance', [AttendanceController::class,'index'])->name('attendance.index');
            Route::get('attendance/{id}', [AttendanceController::class,'show'])->name('attendance.show');
            Route::get('attendance/file/{id}', [AttendanceController::class,'openFile'])->name('attendance.file');
            Route::post('attendance/update/{id}', [AttendanceController::class,'update'])->name('attendance.update');
            Route::get('leaves', [LeaveController::class,'index'])->name('leaves.index');
            Route::get('leaves/{id}', [LeaveController::class,'show'])->name('leaves.show');
            Route::get('leaves/file/{id}', [LeaveController::class,'openFile'])->name('leaves.file');
            Route::post('leaves/update/{id}', [LeaveController::class,'update'])->name('leaves.update');

        });
    });
});
