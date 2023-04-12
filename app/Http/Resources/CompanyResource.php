<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'timezone'=>$this->timezone,
            // 'lat'=>$this?->lat,
            // 'long'=>$this?->long,
            'employees_count'=>$this->employees_count,
            'leaves_count'=>$this->leaves_count,
            'holidays_count'=>$this->holidays_count,
            'code'=>$this->code,
            'advanes_count'=>$this->advanes_count,
            'advanes_perentage'=>$this->advanes_perentage,
            'subscription_end_date'=>$this->subscription_end_date,
            'subscription_id'=>$this->subscription_id,


        ];


    }
}
