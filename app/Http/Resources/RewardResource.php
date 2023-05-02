<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RewardResource extends JsonResource
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
            'reward_date'=>$this->reward_date,
            'reward_value'=>$this->reward_value,
            'req_date'=>$this->created_at,
            'note'=>$this->note,
            'file'=>$this->file,
            'status'=>$this->status,
            'replay'=>$this->replay,
            'reward_type_id'=>$this->rtype->id,
            'user_id'=>$this->user->id,

        ];
    }
}
