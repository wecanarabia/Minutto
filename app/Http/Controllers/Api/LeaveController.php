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
            $user=User::find($model->user_id);
            if($user)
            {
                $user->is_left = 1 ;
                $user->save();
            }

            return $this->returnData( 'data' , new $this->resource( $model ), __('Succesfully'));
        }

        return $this->returnError(__('Sorry! Failed to create !'));
    }

    public function edit($id,Request $request){


        // return $this->update($id,$request->all());
        $model = $this->repositry->getByID($id);
        $user=User::find($model->user_id);


        if ($model) {

            if($model->time_leave && $user->is_left == 1){

                $user->is_left=0;
                $user->save();
            }

            $model = $this->repositry->edit( $id,$request->all() );
            if($model->time_leave && $model->time_leave < $model->from){

                $model->time_status="late";
                $late=Carbon::createFromFormat('H:i:s',$model->from)->diffInMinutes(Carbon::createFromFormat('H:i:s',$model->time_leave));
                $delay=gmdate('H:i:s',$late*60);
                $model->late_period=$delay;
                $model->save();


            }

            if($model->time_back && $model->time_back > $model->to){

                $model->time_status="late";
                $late=Carbon::createFromFormat('H:i:s',$model->time_back)->diffInMinutes(Carbon::createFromFormat('H:i:s',$model->to));
                $delay=gmdate('H:i:s',$late*60);
                $model->late_period=$delay;
                $model->save();


            }


            return $this->returnData('data', new $this->resource( $model ), __('Updated succesfully'));
        }

        return $this->returnError(__('Sorry! Failed to get !'));

    }






    public function myLeaves()
    {

        $leaves = Auth::user()->leaves;
        // $leaves= Leave::where('user_id', Auth::user()->id)->where('time_leave','!=',null)->get();
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


        $data['taken'] = Leave::where('user_id', Auth::user()->id)->where('time_leave','!=',null)
        ->whereMonth('leave_date', $currentM)
        ->whereYear('leave_date', $currentY)
        ->get()->count();


        return $this->returnData('data', $data, __('Succesfully'));
    }

}
