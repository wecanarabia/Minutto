<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalaryResource extends JsonResource
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
            'actual_salary'=>$this->actual_salary,
            'net_salary'=>$this->net_salary,
            'discounts'=>$this->discounts,
            'advances'=>$this->advances,
            'incentives_and_extra'=>$this->incentives_and_extra,
            'user_id'=>$this->user->id,

        ];
    }
}
