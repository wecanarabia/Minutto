<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkdayResource extends JsonResource
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
            'from'=>$this->from,
            'to'=>$this->to,
            'day'=>$this->day,
            'status'=>$this->status,
            'shift_id'=>$this->shift->id,

        ];
    }
}
