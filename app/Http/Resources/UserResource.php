<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id'=>$this->id,
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'email'=>$this->email,
            'lat'=>$this?->lat,
            'long'=>$this?->long,
            'image'=>$this->image,
            'code'=>$this->code,
            'career'=>$this->career,
            'active'=>$this->active,
            'is_pass'=>$this->is_pass,
            'country'=>$this->country,
            'date_of_birth'=>$this->date_of_birth,
            'work_start'=>$this->work_start,
            'duration_of_contract'=>$this?->duration_of_contract,
            'contract_expire'=>$this?->contract_expire,
            'phone'=>$this->phone,
            'bank_name'=>$this->bank_name,
            'bank_branch'=>$this->bank_branch,
            'account_number'=>$this->account_number,
            'branch_id'=>$this->branch_id,
            'shift_id'=>$this->shift_id,
            'fingerprint_id'=>$this->fingerprint_id,

        ];
    }
}
