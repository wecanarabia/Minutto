<?php

namespace App\Http\Controllers\Api;

use App\Models\Vacation;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\VacationResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class VacationController extends ApiController
{
    public function __construct()
    {
        $this->resource = VacationResource::class;
        $this->model = app(Vacation::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }


    public function myVacations()
    {

        $vacations = Auth::user()->vacations;
        return $this->returnData('data',  VacationResource::collection( $vacations ), __('Get  succesfully'));

    }
}
