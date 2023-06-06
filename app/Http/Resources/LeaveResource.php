<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaveResource extends JsonResource
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
            'leave_date'=>$this->leave_date,
            'from'=>$this->from,
            'to'=>$this->to,
            'time_leave'=>$this->time_leave,
            'time_back'=>$this->time_back,
            'note'=>$this->note,
            'file'=>$this->file,
            'status'=>$this->status,
            'replay'=>$this->replay,
            'leave_type_id'=>$this->ltype->id,
            'leave_type_name'=>$this->ltype->name,
            'user_id'=>$this->user->id,
        ];
    }
}
