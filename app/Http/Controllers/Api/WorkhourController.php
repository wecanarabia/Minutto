<?php

namespace App\Http\Controllers\Api;

use App\Models\Workhour;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\WorkhourResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WorkhourController extends ApiController
{

    public function __construct()
    {
        $this->resource = WorkhourResource::class;
        $this->model = app(Workhour::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){


        $model = $this->repositry->save( $request->all() );
        $user=User::find($request->user_id);
        $company=Company::find($user->branch->company->id);
        // dd(company);

        if($company)
        {
            $difference=Carbon::createFromFormat('H:i:s',$model->time_attendance)->diffInMinutes(Carbon::createFromFormat('H:i:s',$user->shift->from));
            $dif=gmdate('H:i:s',$difference*60);
            // dd($dif);
            if($difference == 0)
            {

                $model->status="disciplined";
                $model->save();

            }

            if($dif <= $company->grace_period && $difference != 0)
            {
                $model->status="late";
                $model->save();
            }

            if($dif > $company->grace_period)
            {
                $model->status="late";
                $late=Carbon::createFromFormat('H:i:s',$dif)->diffInMinutes(Carbon::createFromFormat('H:i:s',$company->grace_period));
                $model->discount_value=$late * $company->discount_value;
                $model->save();

            }
        }


        if ($model) {

            if($user){

            $user->is_pass=1;
            $user->save();

            return $this->returnData( 'data' , new $this->resource( $model ), __('Succesfully'));

            }
        }

        return $this->returnError(__('Sorry! Failed to create !'));
    }

    public function edit($id,Request $request){



        $model = $this->repositry->getByID($id);
        if ($model) {
            $model = $this->repositry->edit( $id,$request->all() );

            $user=User::find($model->user_id);

            if($model->time_departure)
            {
            $difference=Carbon::createFromFormat('H:i:s',$model->time_departure)->diffInMinutes(Carbon::createFromFormat('H:i:s',$user->shift->to));
            if($difference > 0)
            {

                $user->extra_value= $user->extra_value + ($user->extra_price * $difference);
                $user->save();

            }

            }

            $today=Carbon::today();

            if($model->time_departure && $model->created_at->isSameDay($today)){

            if($user){

                $user->is_pass=0;
                $user->save();


            }
        }
            return $this->returnData('data', new $this->resource( $model ), __('Updated succesfully'));
        }

        return $this->returnError(__('Sorry! Failed to get !'));




    }


    public function myWorkhours($year,$month)
    {

        $workhours = Workhour::where('user_id',Auth::user()->id)
        ->whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        ->get();

        return $this->returnData('data',  WorkhourResource::collection( $workhours ), __('Get  succesfully'));

    }

}
