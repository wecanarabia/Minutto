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
use App\Http\Controllers\Api\MessageController;



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

    Route::middleware(['auth:api'])->group(function () {


        //view Daily Message
        Route::get('daily-message', [MessageController::class, 'viewDailyMessage']);

    });


    //Company
    Route::get('companies', [CompanyController::class, 'list']);
    Route::post('company-create', [CompanyController::class, 'save']);
    Route::get('company/{id}', [CompanyController::class, 'view']);
    Route::get('company/delete/{id}', [CompanyController::class, 'delete']);
    Route::post('company/edit/{id}', [CompanyController::class, 'edit']);


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
