<?php

namespace App\Http\Controllers\Api;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\ShiftResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class ShiftController extends ApiController
{
    public function __construct()
    {
        $this->resource = ShiftResource::class;
        $this->model = app(Shift::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }
}
