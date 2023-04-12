<?php

namespace App\Http\Controllers\Api;

use App\Models\Fingerprint;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\FingerprintRequest;
use App\Http\Resources\FingerprintResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class FingerprintController extends ApiController
{

    public function __construct()
    {
        $this->resource = FingerprintResource::class;
        $this->model = app(Fingerprint::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

}
