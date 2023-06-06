<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workhour;
use App\Models\User;
use App\Models\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Repositories\Repository;
use App\Http\Resources\WorkhourResource;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;


class ReportController extends ApiController
{

    public function __construct()
    {
        $this->resource = WorkhourResource::class;
        $this->model = app(Workhour::class);
        $this->repositry =  new Repository($this->model);
    }

    public function getCountersForWorkhours($year,$month)
    {



        $data = array();

        $data['audience'] = Workhour::where('user_id', Auth::user()->id)->where('status','disciplined')
        ->orWhere('status','late')
        ->orWhere('status','leave')
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->get()->count();

        $data['late'] = Workhour::where('user_id', Auth::user()->id)
        ->where('status','late')
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(delay))) as total_delay'))
        ->get()[0]->total_delay;

        $data['absence'] = Workhour::where('user_id', Auth::user()->id)
        ->where('status','absence')
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->get()->count();

        $data['discount_late'] = Workhour::where('user_id', Auth::user()->id)
        ->where('status','late')
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->get()->sum('discount_value');

        $data['discount_absence'] = Workhour::where('user_id', Auth::user()->id)
        ->where('status','absence')
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->get()->sum('discount_value');


        return $this->returnData('data', $data, __('Succesfully'));
    }


    public function getCountersForVacations($year,$month)
    {



        $data = array();

        $data['total'] = User::find(Auth::user()->id)->branch->company->holidays_count;

        $data['taken'] = Workhour::where('user_id', Auth::user()->id)->where('status','vacation')
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->get()->count();

        $data['remaining']= $data['total'] - $data['taken'];

        return $this->returnData('data', $data, __('Succesfully'));

    }

    // public function getCountersForLeaves($year,$month)
    // {



    //     $data = array();

    //     $data['total'] = User::find(Auth::user()->id)->branch->company->leaves_count;

    //     $data['taken'] = Leave::where('user_id', Auth::user()->id)->where('time_leave','!=',null)
    //     ->whereMonth('leave_date', $month)
    //     ->whereYear('leave_date', $year)
    //     ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(period))) as total_period'))
    //     ->firstOrFail()
    //      ->total_period;


    //     $tot= User::find(Auth::user()->id)->branch->company->LeaveHours;



    //     $dif=Carbon::createFromFormat('H:i:s',$tot)->diffInMinutes(Carbon::createFromFormat('H:i:s',$data['taken']));
    //     $data['remaining']=gmdate('H:i:s',$dif*60);

    //     return $this->returnData('data', $data, __('Succesfully'));
    // }

    public function getCountersForLeaves($year, $month)
    {
        $data = [];


        $data['total'] = User::find(Auth::user()->id)->branch->company->leaves_count;

        // Get the total time of leaves taken by the user in the specified month and year
        $result = Leave::where('user_id', Auth::user()->id)
            ->where('time_leave', '!=', null)
            ->whereMonth('leave_date', $month)
            ->whereYear('leave_date', $year)
            ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(period))) as total_period'))
            ->firstOrFail()
            ->total_period;



        if ($result === null) {
            $data['taken'] = '00:00:00';
            $data['remaining'] = '00:00:00';
        } else {
            $data['taken'] = $result;

            // Calculate the remaining time for leaves based on the total allowed time and the time already taken
            $totalAllowedTime = User::find(Auth::user()->id)->branch->company->LeaveHours;
            $takenTime = Carbon::createFromFormat('H:i:s', $data['taken'])->diffInMinutes(Carbon::createFromFormat('H:i:s', $totalAllowedTime));
            $data['remaining'] = gmdate('H:i:s', $takenTime * 60);
        }

        return $this->returnData('data', $data, __('Succesfully'));

    }

}
