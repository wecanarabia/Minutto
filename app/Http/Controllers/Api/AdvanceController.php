<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advance;
use App\Models\User;
use App\Repositories\Repository;
use App\Http\Resources\AdvanceResource;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdvanceController extends ApiController
{

    public function __construct()
    {
        $this->resource = AdvanceResource::class;
        $this->model = app(Advance::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

    public function myAdvances()
    {

        $advances = Auth::user()->advances;
        return $this->returnData('data',  AdvanceResource::collection( $advances ), __('Get  succesfully'));

    }

    public function getCountersForAdvances()
    {

        $currentM=Carbon::today()->format('m');
        $currentY=Carbon::today()->format('Y');


        $data = array();

        $percentege=User::find(Auth::user()->id)->branch->company->advances_percentage;
        // $data['total'] = Carbon::parse($leave)->hour;
        $data['percentage'] = $percentege;


        $data['total'] =User::find(Auth::user()->id)->branch->company->advanes_count;

        $data['taken'] = Advance::where('user_id', Auth::user()->id)
        ->whereMonth('created_at', $currentM)
        ->whereYear('created_at', $currentY)
        ->get()->count();


        return $this->returnData('data', $data, __('Succesfully'));
    }

}
