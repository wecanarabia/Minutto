<?php

namespace App\Http\Controllers\Api;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\SubscriptionResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class SubscriptionController extends ApiController
{
    public function __construct()
    {
        $this->resource = SubscriptionResource::class;
        $this->model = app(Subscription::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }
}
