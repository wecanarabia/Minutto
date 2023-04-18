<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkhourResource extends JsonResource
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
            'time_attendance'=>$this->time_attendance,
            'time_departure'=>$this->time_departure,
            'discount_value'=>$this->discount_value,
            'note'=>$this->note,
            'file'=>$this->file,
            'status'=>$this->status,
            'replay'=>$this->replay,
            'created_at'=>$this->created_at,
            'user_id'=>$this->user->id,
        ];
    }
}
