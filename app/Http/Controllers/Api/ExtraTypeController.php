<?php

namespace App\Http\Controllers\Api;


use App\Models\ExtraType;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\ExtraTypeResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class ExtraTypeController extends ApiController
{

    public function __construct()
    {
        $this->resource = ExtraTypeResource::class;
        $this->model = app(ExtraType::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

       public function exTypeByCompany($company_id){


        $com = Company::find($company_id);
        if($com){

        return $this->returnData('data',  $this->resource::collection($com->extratypes ), __('Get  succesfully'));

        }
        return $this->returnError(__('Sorry! Failed to get !'));

    }

}
