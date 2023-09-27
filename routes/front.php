<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\LogController;
use App\Http\Controllers\Front\RoleController;
use App\Http\Controllers\Front\AlertController;
use App\Http\Controllers\Front\ExtraController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\LeaveController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\ShiftController;
use App\Http\Controllers\Front\BranchController;
use App\Http\Controllers\Front\RewardController;
use App\Http\Controllers\Front\SalaryController;
use App\Http\Controllers\Front\AdvanceController;
use App\Http\Controllers\Front\CompanyController;
use App\Http\Controllers\Front\WorkDayController;
use App\Http\Controllers\Front\EmployeeController;
use App\Http\Controllers\Front\VacationController;
use App\Http\Controllers\Front\ExtraTypeController;
use App\Http\Controllers\Front\LeaveTypeController;
use App\Http\Controllers\Front\AttendanceController;
use App\Http\Controllers\Front\DepartmentController;
use App\Http\Controllers\Front\RewardTypeController;
use App\Http\Controllers\Front\CompanyAdminController;
use App\Http\Controllers\Front\DeductionController;
use App\Http\Controllers\Front\VacationTypeController;
use App\Http\Controllers\Front\EmployeeVacationController;
use App\Http\Controllers\Front\MessageController;
use App\Http\Controllers\Front\OfficialVacationController;

Route::group(['prefix' => Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','setLocale'],
    'as' => 'front.'], function () {
    Route::get('/login', [LoginController::class, 'getLogin'])->name('login-page');
    Route::post('/send-login', [LoginController::class, 'postLogin'])->name('login');
        Route::get('/register', [LoginController::class, 'getRegister'])->name('register-page');
    Route::post('/send-register', [LoginController::class, 'postRegister'])->name('register');
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::group(['middleware' => 'auth:company'], function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/home', [IndexController::class, 'home'])->name('home');

            Route::resource('company-settings', CompanyController::class)->except(['destroy', 'index', 'show', 'edit', 'update']);
            Route::get('company-settings/main-branch/create', [CompanyController::class, 'createBranch'])->name('company-settings.branch.create');
            Route::post('company-settings/main-branch/store', [CompanyController::class, 'storeBranch'])->name('company-settings.branch.store');
            Route::get('company-settings/main-shift/create', [CompanyController::class, 'createShift'])->name('company-settings.shift.create');
            Route::post('company-settings/main-shift/store', [CompanyController::class, 'storeShift'])->name('company-settings.shift.store');
            Route::get('company-settings/department/create', [CompanyController::class, 'createDepartment'])->name('company-settings.department.create');
            Route::post('company-settings/department/store', [CompanyController::class, 'storeDepartment'])->name('company-settings.department.store');
            Route::get('company-settings/deduction/create', [CompanyController::class, 'createDeduction'])->name('company-settings.deduction.create');
            Route::post('company-settings/deduction/store', [CompanyController::class, 'storeDeduction'])->name('company-settings.deduction.store');
            Route::get('company-settings/shift-workdays/create', [CompanyController::class, 'createWorkdays'])->name('company-settings.shift-workdays.create');
            Route::post('company-settings/shift-workdays/store', [CompanyController::class, 'storeWorkdays'])->name('company-settings.shift-workdays.store');
            Route::get('company-settings/show', [CompanyController::class, 'show'])->name('company-settings.show');
                       Route::put('company-settings/update', [CompanyController::class, 'update'])->name('company-settings.update');

        Route::group(['middleware' => ['CheckCompany', 'timezone']], function () {
            Route::resource('employees', EmployeeController::class)->except(['destroy', 'edit', 'create', 'store'])->middleware('can:employees');
            Route::resource('departments', DepartmentController::class)->except(['destroy'])->middleware('can:departments');
            Route::resource('branches', BranchController::class)->except(['destroy'])->middleware('can:branches');
            Route::resource('shifts', ShiftController::class)->except(['destroy'])->middleware('can:shifts');
            Route::resource('leave-types', LeaveTypeController::class)->except(['destroy'])->middleware('can:leaves');
            Route::resource('vacation-types', VacationTypeController::class)->except(['destroy'])->middleware('can:vacations');
            Route::resource('allowance-types', RewardTypeController::class)->except(['destroy'])->middleware('can:rewards');
            Route::resource('allowances', RewardController::class)->except(['destroy'])->middleware('can:rewards');
            Route::resource('alerts', AlertController::class)->except(['destroy'])->middleware('can:alerts');
            Route::resource('workdays', WorkDayController::class)->except(['destroy'])->middleware('can:shifts');
            // Route::resource('extra-types', ExtraTypeController::class)->except(['destroy'])->middleware('can:extra');
            Route::resource('official-vacations', OfficialVacationController::class)->except(['destroy'])->middleware('can:official-vacations');
            Route::resource('admins', CompanyAdminController::class)->except(['destroy'])->middleware('can:admins');
            Route::resource('roles', RoleController::class)->except(['destroy'])->middleware('can:roles');
            Route::resource('deductions', DeductionController::class)->except(['destroy','edit'])->middleware('can:attendance');

            //files
            Route::get('rewards/file/{id}', [RewardController::class, 'openFile'])->name('rewards.file')->middleware('can:rewards');
            Route::get('alerts/file/{id}', [AlertController::class, 'openFile'])->name('alerts.file')->middleware('can:alerts');

            //shift-workdays
            Route::get('shifts/workdays/{id}/edit', [WorkDayController::class, 'editShiftWorkdays'])->name('shifts.workdays.edit')->middleware('can:shifts');
            Route::put('shifts/workdays/{id}/update', [WorkDayController::class, 'updateShiftWorkdays'])->name('shifts.workdays.update')->middleware('can:shifts');

            //attendance
            Route::group(['middleware' => 'can:attendance'], function () {
                Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
                Route::get('attendance/{id}', [AttendanceController::class, 'show'])->name('attendance.show');
                Route::get('attendance/file/{id}', [AttendanceController::class, 'openFile'])->name('attendance.file');
                Route::put('attendance/update/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
            });
            //leaves
            Route::group(['middleware' => 'can:leaves'], function () {
                Route::get('leaves', [LeaveController::class, 'index'])->name('leaves.index');
                Route::get('leaves/{id}', [LeaveController::class, 'show'])->name('leaves.show');
                Route::get('leaves/file/{id}', [LeaveController::class, 'openFile'])->name('leaves.file');
                Route::put('leaves/update/{id}', [LeaveController::class, 'update'])->name('leaves.update');
            });
            //vacations
            Route::group(['middleware' => 'can:vacations'], function () {
                Route::get('vacation-requests', [VacationController::class, 'index'])->name('vacations.index');
                Route::get('vacation-requests/{id}', [VacationController::class, 'show'])->name('vacations.show');
                Route::get('vacation-requests/file/{id}', [VacationController::class, 'openFile'])->name('vacations.file');
                Route::put('vacation-requests/update/{id}', [VacationController::class, 'update'])->name('vacations.update');
            });
            //advances
            Route::group(['middleware' => 'can:advances'], function () {
                Route::get('advances', [AdvanceController::class, 'index'])->name('advances.index');
                Route::get('advances/{id}', [AdvanceController::class, 'show'])->name('advances.show');
                Route::get('advances/file/{id}', [AdvanceController::class, 'openFile'])->name('advances.file');
                Route::put('advances/update/{id}', [AdvanceController::class, 'update'])->name('advances.update');
            });
            //extras
            Route::group(['middleware' => 'can:extra'], function () {

                Route::get('extras', [ExtraController::class, 'index'])->name('extras.index');
                Route::get('extras/{id}', [ExtraController::class, 'show'])->name('extras.show');
                Route::get('extras/file/{id}', [ExtraController::class, 'openFile'])->name('extras.file');
                Route::put('extras/update/{id}', [ExtraController::class, 'update'])->name('extras.update');
            });
            //messages
            Route::group(['middleware' => 'can:messages'], function () {
                Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
                Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
                Route::post('messages/store', [MessageController::class, 'store'])->name('messages.store');
                Route::get('messages/show', [MessageController::class, 'show'])->name('messages.show');
                Route::put('messages/update', [MessageController::class, 'update'])->name('messages.update');
            });
            //employee-vacations
            Route::group(['middleware' => 'can:vacations'], function () {
                Route::get('employee-vacations', [EmployeeVacationController::class, 'index'])->name('employee-vacations.index');
                Route::get('employee-vacations/generate', [EmployeeVacationController::class, 'generate'])->name('employee-vacations.generate');
                Route::get('employee-vacations/create', [EmployeeVacationController::class, 'create'])->name('employee-vacations.create');
                Route::post('employee-vacations/store', [EmployeeVacationController::class, 'store'])->name('employee-vacations.store');
                Route::get('employee-vacations/{id}', [EmployeeVacationController::class, 'show'])->name('employee-vacations.show');
                Route::put('employee-vacations/update/{id}', [EmployeeVacationController::class, 'update'])->name('employee-vacations.update');
            });
            //salaries
            Route::group(['middleware' => 'can:salaries'], function () {
                Route::get('salaries', [SalaryController::class, 'index'])->name('salaries.index');
                Route::get('salaries/generate', [SalaryController::class, 'generate'])->name('salaries.generate');
                Route::get('salaries/update', [SalaryController::class, 'update'])->name('salaries.update');
                Route::get('salaries/create', [SalaryController::class, 'create'])->name('salaries.create');
                Route::post('salaries/store', [SalaryController::class, 'store'])->name('salaries.store');
                Route::post('salaries/filter', [SalaryController::class, 'filter'])->name('salaries.filter');
                Route::get('salaries/{id}', [SalaryController::class, 'show'])->name('salaries.show');
                Route::get('salaries/export/{month}/{year}', [SalaryController::class, 'export'])->name('salaries.export');
            });

            //logs
            Route::get('logs', [LogController::class, 'index'])->name('logs.index')->middleware('can:logs');
            Route::get('logs/{id}', [LogController::class, 'show'])->name('logs.show')->middleware('can:logs');
            Route::get('/{any}', function($any){
                return abort('404');
            })->where('any', '.*');
        });
    });
});
