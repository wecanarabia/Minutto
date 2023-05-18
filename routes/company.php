<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\RoleController;
use App\Http\Controllers\Company\AlertController;
use App\Http\Controllers\Company\ExtraController;
use App\Http\Controllers\Company\IndexController;
use App\Http\Controllers\Company\LeaveController;
use App\Http\Controllers\Company\LoginController;
use App\Http\Controllers\Company\ShiftController;
use App\Http\Controllers\Company\BranchController;
use App\Http\Controllers\Company\RewardController;
use App\Http\Controllers\Company\SalaryController;
use App\Http\Controllers\Company\AdvanceController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\WorkDayController;
use App\Http\Controllers\Company\EmployeeController;
use App\Http\Controllers\Company\VacationController;
use App\Http\Controllers\Company\ExtraTypeController;
use App\Http\Controllers\Company\LeaveTypeController;
use App\Http\Controllers\Company\AttendanceController;
use App\Http\Controllers\Company\DepartmentController;
use App\Http\Controllers\Company\RewardTypeController;
use App\Http\Controllers\Company\CompanyAdminController;
use App\Http\Controllers\Company\VacationTypeController;
use App\Http\Controllers\Company\EmployeeVacationController;
use App\Http\Controllers\Company\OfficialVacationController;

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
            Route::resource('vacation-types', VacationTypeController::class)->except(['destroy']);
            Route::resource('reward-types', RewardTypeController::class)->except(['destroy']);
            Route::resource('rewards', RewardController::class)->except(['destroy']);
            Route::resource('alerts', AlertController::class)->except(['destroy']);
            Route::resource('workdays', WorkDayController::class)->except(['destroy']);
            Route::resource('extra-types', ExtraTypeController::class)->except(['destroy']);
            Route::resource('official-vacations', OfficialVacationController::class)->except(['destroy']);
            Route::resource('admins', CompanyAdminController::class)->except(['destroy']);
            Route::resource('roles', RoleController::class)->except(['destroy']);

            //files
            Route::get('rewards/file/{id}', [RewardController::class,'openFile'])->name('rewards.file');
            Route::get('alerts/file/{id}', [AlertController::class,'openFile'])->name('alerts.file');

            //shift-workdays
            Route::get('shifts/workdays/{id}/edit', [WorkDayController::class,'editShiftWorkdays'])->name('shifts.workdays.edit');
            Route::put('shifts/workdays/{id}/update', [WorkDayController::class,'updateShiftWorkdays'])->name('shifts.workdays.update');

            //attendance
            Route::get('attendance', [AttendanceController::class,'index'])->name('attendance.index');
            Route::get('attendance/{id}', [AttendanceController::class,'show'])->name('attendance.show');
            Route::get('attendance/file/{id}', [AttendanceController::class,'openFile'])->name('attendance.file');
            Route::post('attendance/update/{id}', [AttendanceController::class,'update'])->name('attendance.update');

            //leaves
            Route::get('leaves', [LeaveController::class,'index'])->name('leaves.index');
            Route::get('leaves/{id}', [LeaveController::class,'show'])->name('leaves.show');
            Route::get('leaves/file/{id}', [LeaveController::class,'openFile'])->name('leaves.file');
            Route::post('leaves/update/{id}', [LeaveController::class,'update'])->name('leaves.update');

            //vacations
            Route::get('vacations', [VacationController::class,'index'])->name('vacations.index');
            Route::get('vacations/{id}', [VacationController::class,'show'])->name('vacations.show');
            Route::get('vacations/file/{id}', [VacationController::class,'openFile'])->name('vacations.file');
            Route::post('vacations/update/{id}', [VacationController::class,'update'])->name('vacations.update');

            //advances
            Route::get('advances', [AdvanceController::class,'index'])->name('advances.index');
            Route::get('advances/{id}', [AdvanceController::class,'show'])->name('advances.show');
            Route::get('advances/file/{id}', [AdvanceController::class,'openFile'])->name('advances.file');
            Route::post('advances/update/{id}', [AdvanceController::class,'update'])->name('advances.update');

            //extras
            Route::get('extras', [ExtraController::class,'index'])->name('extras.index');
            Route::get('extras/{id}', [ExtraController::class,'show'])->name('extras.show');
            Route::get('extras/file/{id}', [ExtraController::class,'openFile'])->name('extras.file');
            Route::post('extras/update/{id}', [ExtraController::class,'update'])->name('extras.update');

             //employee-vacations
             Route::get('employee-vacations', [EmployeeVacationController::class,'index'])->name('employee-vacations.index');
             Route::get('employee-vacations/generate', [EmployeeVacationController::class,'generate'])->name('employee-vacations.generate');
             Route::get('employee-vacations/create', [EmployeeVacationController::class,'create'])->name('employee-vacations.create');
             Route::post('employee-vacations/store', [EmployeeVacationController::class,'store'])->name('employee-vacations.store');
             Route::get('employee-vacations/{id}', [EmployeeVacationController::class,'show'])->name('employee-vacations.show');
             Route::post('employee-vacations/update/{id}', [EmployeeVacationController::class,'update'])->name('employee-vacations.update');

             //salaries
             Route::get('salaries', [SalaryController::class,'index'])->name('salaries.index');
             Route::get('salaries/generate', [SalaryController::class,'generate'])->name('salaries.generate');
             Route::get('salaries/update', [SalaryController::class,'update'])->name('salaries.update');
             Route::get('salaries/create', [SalaryController::class,'create'])->name('salaries.create');
             Route::post('salaries/store', [SalaryController::class,'store'])->name('salaries.store');
             Route::get('salaries/filter', [SalaryController::class,'filter'])->name('salaries.filter');
             Route::get('salaries/{id}', [SalaryController::class,'show'])->name('salaries.show');
        });
    });
});
