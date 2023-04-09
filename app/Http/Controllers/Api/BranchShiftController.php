<?php

namespace App\Http\Controllers\Api;

use App\Models\BranchShift;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\BranchShiftRequest;
use App\Http\Resources\BranchShiftResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class BranchShiftController extends ApiController
{
    public function __construct()
    {
        $this->resource = BranchShiftResource::class;
        $this->model = app(BranchShift::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){

        $model = BranchShift::where('branch_id',$request->branch_id)->where('shift_id',$request->shift_id)->first();
        if($model){
            return $this->returnError(__('Sorry! This already exist !'));
        }
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }
}
