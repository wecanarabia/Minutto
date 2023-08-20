<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\FaqRequest;
use App\Http\Resources\FaqResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class FaqController extends ApiController
{
    public function __construct()
    {
        $this->resource = FaqResource::class;
        $this->model = app(Faq::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

    public function getFaqsOfCompany($company_id){

        $com = Company::find($company_id);
        if($com){

        return $this->returnData('data',  $this->resource::collection($com->faqs ), __('Get  succesfully'));

        }
        return $this->returnError(__('Sorry! Failed to get !'));

    }

}
