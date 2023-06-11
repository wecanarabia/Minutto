<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\ShiftController;
use App\Http\Controllers\Api\BranchShiftController;
use App\Http\Controllers\Api\FingerprintController;
use App\Http\Controllers\Api\FingerprintCompanyController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\VacationTypeController;
use App\Http\Controllers\Api\VacationController;
use App\Http\Controllers\Api\LeaveTypeController;
use App\Http\Controllers\Api\LeaveController;
use App\Http\Controllers\Api\WorkhourController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\AdvanceController;
use App\Http\Controllers\Api\AlertController;
use App\Http\Controllers\Api\WorkdayController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\RewardController;
use App\Http\Controllers\Api\RewardTypeController;
use App\Http\Controllers\Api\ExtraController;
use App\Http\Controllers\Api\ExtraTypeController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SalaryController;










/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    //Auth
    Route::post('login', [AuthController::class, 'login']);

    Route::post('/user-reg', [AuthController::class, 'store']);

    Route::post('/user-edit/{id}', [AuthController::class, 'updateUser']);

    Route::post('change-password', [AuthController::class, 'changePassword']);

    Route::get('/user/{id}', [AuthController::class, 'userProfile']);

    Route::middleware(['auth:api','timezone'])->group(function () {


        //view Daily Message
        Route::get('daily-message', [MessageController::class, 'viewDailyMessage']);

        //my vacations
        Route::get('my-vacations', [VacationController::class, 'myVacations']);


         //my leaves
         Route::get('my-leaves', [LeaveController::class, 'myLeaves']);


         //my workhours
         Route::get('my-workhours/{year}/{month}', [WorkhourController::class, 'myWorkhours']);

         //my advances
         Route::get('my-advances', [AdvanceController::class, 'myAdvances']);

           //my alerts
           Route::get('my-alerts', [AlertController::class, 'myAlerts']);


             //my rewards
             Route::get('my-rewards', [RewardController::class, 'myRewards']);

             //mySalaries

             Route::get('my-salaries/{year}/{month}', [SalaryController::class, 'mySalaries']);


             Route::get('salaries', [SalaryController::class, 'salaries']);


         //getCountersForLeaves
         Route::get('count-leaves', [LeaveController::class, 'getCountersForLeaves']);


         //getCountersForVacations
         Route::get('count-vacations', [WorkhourController::class, 'getCountersForVacations']);

        // getCountersForAdvances
         Route::get('count-advances', [AdvanceController::class, 'getCountersForAdvances']);

         //getCountersForWorkhours
         Route::get('count-workhours/{year}/{month}', [ReportController::class, 'getCountersForWorkhours']);

        // getCountersForVacations
        Route::get('count-allvacations/{year}/{month}', [ReportController::class, 'getCountersForVacations']);

        // getCountersForLeaves
       Route::get('count-all-leaves/{year}/{month}', [ReportController::class, 'getCountersForLeaves']);



       //getLastWorkhour
       Route::get('last-workhour', [WorkhourController::class, 'getLastWorkhour']);

       //getLastLeave
       Route::get('last-leave', [LeaveController::class, 'getLastLeave']);

    });


    Route::middleware('changeLang')->group(function () {

    //Company
    Route::get('companies', [CompanyController::class, 'list']);
    Route::post('company-create', [CompanyController::class, 'save']);
    Route::get('company/{id}', [CompanyController::class, 'view']);
    Route::get('company/delete/{id}', [CompanyController::class, 'delete']);
    Route::post('company/edit/{id}', [CompanyController::class, 'edit']);

    });


    //faq
    Route::get('faqs', [FaqController::class, 'list']);
    Route::post('faq-create', [FaqController::class, 'save']);
    Route::get('faq/{id}', [FaqController::class, 'view']);
    Route::post('faq/edit/{id}', [FaqController::class, 'edit']);
    Route::get('faq/delete/{id}', [FaqController::class, 'delete']);


     //pages
    Route::get('pages', [PageController::class, 'list']);
    Route::post('page-create', [PageController::class, 'save']);
    Route::get('page/{id}', [PageController::class, 'view']);
    Route::get('page/delete/{id}', [PageController::class, 'delete']);
    Route::post('page/edit/{id}', [PageController::class, 'edit']);


    Route::get('days', [PageController::class, 'getDaysNumber']);

    //Branch
    Route::get('branchs', [BranchController::class, 'list']);
    Route::post('branch-create', [BranchController::class, 'save']);
    Route::get('branch/{id}', [BranchController::class, 'view']);
    Route::get('branch/delete/{id}', [BranchController::class, 'delete']);
    Route::post('branch/edit/{id}', [BranchController::class, 'edit']);

    //Shift
    Route::get('shifts', [ShiftController::class, 'list']);
    Route::post('shift-create', [ShiftController::class, 'save']);
    Route::get('shift/{id}', [ShiftController::class, 'view']);
    Route::get('shift/delete/{id}', [ShiftController::class, 'delete']);
    Route::post('shift/edit/{id}', [ShiftController::class, 'edit']);

    //BranchShift
    Route::post('branch-shift-create', [BranchShiftController::class, 'save']);
    Route::get('branchshift/delete/{id}', [BranchShiftController::class, 'delete']);

    //Fingerprint
    Route::get('fingerprints', [FingerprintController::class, 'list']);
    Route::post('fingerprint-create', [FingerprintController::class, 'save']);
    Route::get('fingerprint/{id}', [FingerprintController::class, 'view']);
    Route::get('fingerprint/delete/{id}', [FingerprintController::class, 'delete']);
    Route::post('fingerprint/edit/{id}', [FingerprintController::class, 'edit']);


     //fingerprint-company
     Route::post('fingerprint-company-create', [FingerprintCompanyController::class, 'save']);
     Route::get('fingerprintcompany/delete/{id}', [FingerprintCompanyController::class, 'delete']);



       //Subscription
    Route::get('subscriptions', [SubscriptionController::class, 'list']);
    Route::post('subscription-create', [SubscriptionController::class, 'save']);
    Route::get('subscription/{id}', [SubscriptionController::class, 'view']);
    Route::get('subscription/delete/{id}', [SubscriptionController::class, 'delete']);
    Route::post('subscription/edit/{id}', [SubscriptionController::class, 'edit']);


       //Message
       Route::get('messages', [MessageController::class, 'list']);
       Route::post('message-create', [MessageController::class, 'save']);
       Route::get('message/{id}', [MessageController::class, 'view']);
       Route::get('message/delete/{id}', [MessageController::class, 'delete']);
       Route::post('message/edit/{id}', [MessageController::class, 'edit']);


          //Vacation
          Route::get('vacations', [VacationController::class, 'list']);
          Route::post('vacation-create', [VacationController::class, 'save']);
          Route::get('vacation/{id}', [VacationController::class, 'view']);
          Route::get('vacation/delete/{id}', [VacationController::class, 'delete']);
          Route::post('vacation/edit/{id}', [VacationController::class, 'edit']);

         //VacationType
         Route::get('vacation-types', [VacationTypeController::class, 'list']);
         Route::post('vacation-type-create', [VacationTypeController::class, 'save']);
         Route::get('vacation-type/{id}', [VacationTypeController::class, 'view']);
         Route::get('vacation-type/delete/{id}', [VacationTypeController::class, 'delete']);
         Route::post('vacation-type/edit/{id}', [VacationTypeController::class, 'edit']);

         //vacation types for company
         Route::get('vacation-types/{company_id}', [VacationTypeController::class, 'vacTypeByCompany']);


         //Leave
         Route::get('leaves', [LeaveController::class, 'list']);
         Route::post('leave-create', [LeaveController::class, 'save']);
         Route::get('leave/{id}', [LeaveController::class, 'view']);
         Route::get('leave/delete/{id}', [LeaveController::class, 'delete']);
         Route::post('leave/edit/{id}', [LeaveController::class, 'edit']);



         //LeaveType
         Route::get('leave-types', [LeaveTypeController::class, 'list']);
         Route::post('leave-type-create', [LeaveTypeController::class, 'save']);
         Route::get('leave-type/{id}', [LeaveTypeController::class, 'view']);
         Route::get('leave-type/delete/{id}', [LeaveTypeController::class, 'delete']);
         Route::post('leave-type/edit/{id}', [LeaveTypeController::class, 'edit']);

           //leave types for company
        Route::get('leave-types/{company_id}', [LeaveTypeController::class, 'leavesTypeByCompany']);
        Route::get('leave-types/{company_id}', [LeaveTypeController::class, 'leavesTypeByCompany']);




        //workhour
         Route::get('workhours', [WorkhourController::class, 'list']);
         Route::post('workhour-create', [WorkhourController::class, 'save']);
         Route::get('workhour/{id}', [WorkhourController::class, 'view']);
         Route::get('workhour/delete/{id}', [WorkhourController::class, 'delete']);
         Route::post('workhour/edit/{id}', [WorkhourController::class, 'edit']);


         //Advance
         Route::get('advances', [AdvanceController::class, 'list']);
         Route::post('advance-create', [AdvanceController::class, 'save']);
         Route::get('advance/{id}', [AdvanceController::class, 'view']);
         Route::get('advance/delete/{id}', [AdvanceController::class, 'delete']);
         Route::post('advance/edit/{id}', [AdvanceController::class, 'edit']);


           //Alert
           Route::get('alerts', [AlertController::class, 'list']);
           Route::post('alert-create', [AlertController::class, 'save']);
           Route::get('alert/{id}', [AlertController::class, 'view']);
           Route::get('alert/delete/{id}', [AlertController::class, 'delete']);
           Route::post('alert/edit/{id}', [AlertController::class, 'edit']);


         //workday
         Route::get('workdays', [WorkdayController::class, 'list']);
         Route::post('workday-create', [WorkdayController::class, 'save']);
         Route::get('workday/{id}', [WorkdayController::class, 'view']);
         Route::get('workday/delete/{id}', [WorkdayController::class, 'delete']);
         Route::post('workday/edit/{id}', [WorkdayController::class, 'edit']);



         //discounts
         Route::get('discounts', [DiscountController::class, 'list']);
         Route::post('discount-create', [DiscountController::class, 'save']);
         Route::get('discount/{id}', [DiscountController::class, 'view']);
         Route::get('discount/delete/{id}', [DiscountController::class, 'delete']);
         Route::post('discount/edit/{id}', [DiscountController::class, 'edit']);



        //workhour
         Route::get('workhours', [WorkhourController::class, 'list']);
         Route::post('workhour-create', [WorkhourController::class, 'save']);
         Route::get('workhour/{id}', [WorkhourController::class, 'view']);
         Route::get('workhour/delete/{id}', [WorkhourController::class, 'delete']);
         Route::post('workhour/edit/{id}', [WorkhourController::class, 'edit']);


            //Reward
            Route::get('rewards', [RewardController::class, 'list']);
            Route::post('reward-create', [RewardController::class, 'save']);
            Route::get('reward/{id}', [RewardController::class, 'view']);
            Route::get('reward/delete/{id}', [RewardController::class, 'delete']);
            Route::post('reward/edit/{id}', [RewardController::class, 'edit']);



            //RewardType
            Route::get('reward-types', [RewardTypeController::class, 'list']);
            Route::post('reward-type-create', [RewardTypeController::class, 'save']);
            Route::get('reward-type/{id}', [RewardTypeController::class, 'view']);
            Route::get('reward-type/delete/{id}', [RewardTypeController::class, 'delete']);
            Route::post('reward-type/edit/{id}', [RewardTypeController::class, 'edit']);

              //reward types for company
           Route::get('reward-types/{company_id}', [RewardTypeController::class, 'rewTypeByCompany']);


              //extra
              Route::get('extras', [ExtraController::class, 'list']);
              Route::post('extra-create', [ExtraController::class, 'save']);
              Route::get('extra/{id}', [ExtraController::class, 'view']);
              Route::get('extra/delete/{id}', [ExtraController::class, 'delete']);
              Route::post('extra/edit/{id}', [ExtraController::class, 'edit']);



              //extraType
              Route::get('extra-types', [ExtraTypeController::class, 'list']);
              Route::post('extra-type-create', [ExtraTypeController::class, 'save']);
              Route::get('extra-type/{id}', [ExtraTypeController::class, 'view']);
              Route::get('extra-type/delete/{id}', [ExtraTypeController::class, 'delete']);
              Route::post('extra-type/edit/{id}', [ExtraTypeController::class, 'edit']);

                //extra types for company
             Route::get('extra-types/{company_id}', [ExtraTypeController::class, 'exTypeByCompany']);
