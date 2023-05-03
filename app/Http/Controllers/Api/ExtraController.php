<?php

namespace App\Http\Controllers\Api;

use App\Models\Extra;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\ExtraResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ExtraController extends ApiController
{
    public function __construct()
    {
        $this->resource = ExtraResource::class;
        $this->model = app(Extra::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

}
