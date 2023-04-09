<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\ShiftController;
use App\Http\Controllers\Api\BranchShiftController;

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

