<?php

namespace App\Http\Controllers\Api;

use App\Models\Page;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\PageRequest;
use App\Http\Resources\PageResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class PageController extends ApiController
{
    public function __construct()
    {
        $this->resource = PageResource::class;
        $this->model = app(Page::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

    public function getPagesOfCompany($company_id){

        $com = Company::find($company_id);
        if($com){

        return $this->returnData('data',  $this->resource::collection($com->pages ), __('Get  succesfully'));

        }
        return $this->returnError(__('Sorry! Failed to get !'));

    }




}
