<?php

namespace App\Http\Controllers\Api;

use App\Models\Leave;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\LeaveResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class LeaveController extends ApiController
{

    public function __construct()
    {
        $this->resource = LeaveResource::class;
        $this->model = app(Leave::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }


    public function myLeaves()
    {

        $leaves = Auth::user()->leaves;
        return $this->returnData('data',  LeaveResource::collection( $leaves ), __('Get  succesfully'));

    }

}
