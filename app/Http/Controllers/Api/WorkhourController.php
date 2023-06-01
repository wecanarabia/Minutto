<?php

namespace App\Http\Controllers\Api;

use App\Models\Workhour;
use App\Models\Workday;
use App\Models\Discount;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\WorkhourResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

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
        $currentD=Carbon::today()->format('l');
        $workday=Workday::where('shift_id',$user->shift_id)
                        ->where('day',$currentD)
                        ->where('status',1)
                        ->first();

        if($company)
        {
            return $workday->from;
            $difference=Carbon::createFromFormat('H:i:s',$model->time_attendance)->diffInMinutes(Carbon::createFromFormat('H:i:s',$workday->from));
            $dif=gmdate('H:i:s',$difference*60);
            // dd($dif);

            if($difference == 0 || $model->time_attendance <= $workday->from )
            {

                $model->status="disciplined";
                $model->save();

            }

            if($dif <= $company->grace_period && $difference != 0 && $model->time_attendance > $workday->from)
            {

                $late=Carbon::createFromFormat('H:i:s',$company->grace_period)->diffInMinutes(Carbon::createFromFormat('H:i:s',$dif));
                $delay=gmdate('H:i:s',$difference*60);
                $model->status="late";
                $model->delay=$delay;
                $model->save();
            }

            if($dif > $company->grace_period && $model->time_attendance > $workday->from)
            {
                $model->status="late";
                $late=Carbon::createFromFormat('H:i:s',$dif)->diffInMinutes(Carbon::createFromFormat('H:i:s',$company->grace_period));
                $delay=gmdate('H:i:s',$difference*60);

                $discount = Discount::select('from','to',DB::raw('(TIME_TO_SEC(percentage)/60) as total_per'))
                ->where('company_id',$company->id)
                ->get();


                foreach($discount as $dis) {


                    if($dis->from <= $model->time_attendance && $model->time_attendance <= $dis->to){

                        $disminute=($user->hourly_salary) / 60;
                        $model->discount_value=($dis->total_per) * $disminute;
                        $model->save();

                    }

                    }


                $model->delay=$delay;
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

    public function getCountersForVacations()
    {

        $currentM=Carbon::today()->format('m');
        $currentY=Carbon::today()->format('Y');


        $data = array();

        $data['total'] = User::find(Auth::user()->id)->branch->company->holidays_count;

        $data['taken'] = Workhour::where('user_id', Auth::user()->id)->where('status','vacation')
        ->orWhere('status','absence')
        ->whereMonth('created_at', $currentM)
        ->whereYear('created_at', $currentY)
        ->get()->count();


        return $this->returnData('data', $data, __('Succesfully'));
    }

}
