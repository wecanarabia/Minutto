<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CompanyController extends ApiController
{
    public function __construct()
    {
        $this->resource = CompanyResource::class;
        $this->model = app(Company::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

    public function getTime()
    {

         $timezone=Branch::find(Auth::user()->branch_id)->company?->timezone;
        // $timezone = $request->timezone;
        $time = Carbon::now($timezone)->toDateTimeString();

        return $this->returnSuccessMessage($time);
    }
}
