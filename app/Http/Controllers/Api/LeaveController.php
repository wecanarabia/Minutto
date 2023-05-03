<?php

namespace App\Http\Controllers\Api;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\LeaveResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LeaveController extends ApiController
{

    public function __construct()
    {
        $this->resource = LeaveResource::class;
        $this->model = app(Leave::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){

        $model = $this->repositry->save( $request->all() );
        $diff=Carbon::createFromFormat('H:i:s',$model->to)->diffInMinutes(Carbon::createFromFormat('H:i:s',$model->from));
        $period=gmdate('H:i:s',$diff*60);
        $model->period=$period;
        $model->save();


        if ($model) {
            return $this->returnData( 'data' , new $this->resource( $model ), __('Succesfully'));
        }

        return $this->returnError(__('Sorry! Failed to create !'));
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }


    public function myLeaves()
    {

        $leaves = Auth::user()->leaves;
        return $this->returnData('data',  LeaveResource::collection( $leaves ), __('Get  succesfully'));

    }

       public function getCountersForLeaves()
    {

        $currentM=Carbon::today()->format('m');
        $currentY=Carbon::today()->format('Y');


        $data = array();

        $leave=User::find(Auth::user()->id)->branch->company->leaves_count;
        // $data['total'] = Carbon::parse($leave)->hour;
        $data['total'] = $leave;


        $data['taken'] = Leave::where('user_id', Auth::user()->id)->where('status','approve')
        ->whereMonth('leave_date', $currentM)
        ->whereYear('leave_date', $currentY)
        ->get()->count();


        return $this->returnData('data', $data, __('Succesfully'));
    }

}
