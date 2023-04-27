<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Repositories\Repository;
use App\Http\Resources\DiscountResource;
use App\Http\Controllers\ApiController;

class DiscountController extends ApiController
{

    public function __construct()
    {
        $this->resource = DiscountResource::class;
        $this->model = app(Discount::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

}
