<?php

namespace App\Http\Controllers\Api;

use App\Models\FingerprintCompany;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\FingerprintCompanyRequest;
use App\Http\Resources\FingerprintCompanyResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class FingerprintCompanyController extends ApiController
{
    public function save( Request $request ){

        $model = FingerprintCompany::where('fingerprint_id',$request->fingerprint_id)->where('company_id',$request->company_id)->first();
        if($model){
            return $this->returnError(__('Sorry! This already exist !'));
        }
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }
}
