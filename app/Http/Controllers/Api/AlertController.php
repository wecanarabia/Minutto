<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alert;
use App\Models\User;
use App\Repositories\Repository;
use App\Http\Resources\AlertResource;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class AlertController extends ApiController
{

    public function __construct()
    {
        $this->resource = AlertResource::class;
        $this->model = app(Alert::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

    public function myAlerts()
    {

        $alerts = Auth::user()->alerts;
        return $this->returnData('data',  AlertResource::collection( $alerts ), __('Get  succesfully'));

    }


}
