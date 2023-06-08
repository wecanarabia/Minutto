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
            'last_name'=>(string)$this?->last_name,
            'email'=>$this->email,
            'lat'=>(double)$this?->lat,
            'long'=>(double)$this?->long,
            'image'=>(string)$this?->image,
            'code'=>(string)$this?->code,
            'career'=>(string)$this?->career,
            'active'=>$this?->active,
            'is_pass'=>$this?->is_pass,
            'is_left'=>$this?->is_left,
            'country'=>(string)$this?->country,
            'date_of_birth'=>$this?->date_of_birth,
            'work_start'=>$this?->work_start,
            'duration_of_contract'=>(string)$this?->duration_of_contract,
            'contract_expire'=>$this?->contract_expire,
            'phone'=>(string)$this?->phone,
            'bank_name'=>(string)$this?->bank_name,
            'bank_branch'=>(string)$this?->bank_branch,
            'account_number'=>(string)$this?->account_number,
            'branch_id'=>$this->branch_id,
            'shift_id'=>$this->shift_id,
            'fingerprint_id'=>$this->fingerprint_id,
            'ipan'=>$this?->ipan,
            'swift_number'=>$this?->swift_number,
            'nationality'=>$this?->nationality,
            'addrees'=>$this?->addrees,
            'national_identity'=>$this?->national_identity,
            'passport_identity'=>$this?->passport_identity,
            'gender'=>$this?->gender,
            'marial_status'=>$this?->marial_status,
            'emergency_contact'=>$this?->emergency_contact,
            'description'=>$this?->description,

        ];
    }
}
