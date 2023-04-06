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
            'location'=>$this->location,
            'lat'=>$this?->lat,
            'long'=>$this?->long,
            'count_leave'=>$this->count_leave,
            'count_vacation'=>$this->count_vacation,
            'count_users'=>$this->count_users,
            'code'=>$this->code,
        ];
    }
}
