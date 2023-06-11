<?php

namespace App\Http\Controllers\Api;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\SalaryResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class SalaryController extends ApiController
{

    public function __construct()
    {
        $this->resource = SalaryResource::class;
        $this->model = app(Salary::class);
        $this->repositry =  new Repository($this->model);
    }



    public function salaries()
    {

        $salaries = Salary::where('user_id',Auth::user()->id)
        ->get();

        return $this->returnData('data',  SalaryResource::collection( $salaries ), __('Get  succesfully'));

    }

    public function mySalaries($year,$month)
    {

        $salaries = Salary::where('user_id',Auth::user()->id)
        ->where('year', $year)
        ->where('month', $month)
        ->get();

        return $this->returnData('data',  SalaryResource::collection( $salaries ), __('Get  succesfully'));

    }



}
