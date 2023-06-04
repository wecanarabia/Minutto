<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacationResource extends JsonResource
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
            'note'=>$this->note,
            'file'=>$this->file,
            'status'=>$this->status,
            'replay'=>$this->replay,
            'vacation_type_id'=>$this->vtype->id,
            'vacation_type_name'=>$this->vtype->name,
            'user_id'=>$this->user->id,

        ];
    }
}
