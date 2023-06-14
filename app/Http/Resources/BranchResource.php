<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
                'company_id'=>$this->company?->id,
                'company_currency'=>$this->company?->currency,
        ];
    }
}
