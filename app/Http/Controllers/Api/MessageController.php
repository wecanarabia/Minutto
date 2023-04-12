<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Repositories\Repository;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class MessageController extends ApiController
{
    public function __construct()
    {
        $this->resource = MessageResource::class;
        $this->model = app(Message::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }

    public function viewDailyMessage(){

    $company_id=Auth()->user()->branch?->company?->id;
    $message= Message::where('company_id',$company_id)->latest('id')->first();

    if ($message) {
        return $this->returnData('data', new $this->resource( $message ), __('Get  succesfully'));
    }

    return $this->returnError(__('Sorry! Failed to get !'));

    }


}
