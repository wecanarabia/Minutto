<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvanceResource extends JsonResource
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
                'req_date'=>$this->req_date,
                'value'=>$this->value,
                'created_at'=>$this->created_at,
                'note'=>$this->note,
                'file'=>$this->file,
                'status'=>$this->status,
                'replay'=>$this->replay,
                'user_id'=>$this->user->id,


        ];
    }
}
