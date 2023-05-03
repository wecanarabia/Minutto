<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExtraResource extends JsonResource
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
            'extra_date'=>$this->extra_date,
            'from'=>$this->from,
            'to'=>$this->to,
            'note'=>$this->note,
            'file'=>$this->file,
            'status'=>$this->status,
            'replay'=>$this->replay,
            'extra_type_id'=>$this->extype->id,
            'user_id'=>$this->user->id,
        ];
    }
}
