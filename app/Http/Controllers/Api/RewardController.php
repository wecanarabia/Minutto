<?php

namespace App\Http\Controllers\Api;

use App\Models\Reward;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\RewardResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class RewardController extends ApiController
{

    public function __construct()
    {
        $this->resource = RewardResource::class;
        $this->model = app(Reward::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }


    public function myRewards()
    {

        $rewards = Auth::user()->rewards;
        return $this->returnData('data',  RewardResource::collection( $rewards ), __('Get  succesfully'));

    }

}
