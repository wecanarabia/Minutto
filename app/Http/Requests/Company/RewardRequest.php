<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class RewardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $this['status'] = json_decode($this->status,true);

        return [
            'reward_date'=>'required|date',
            'reward_value'=>'required|numeric|min:0',
            'note'=>'required|min:5|max:2000',
            'file'=>'mimes:jpg,gif,jpeg,png,mp4,pdf,txt,mkv,flv,docs,doc,3gb,xlsx,pptx|max:4000',
            'status.en'=>"in:waiting,approve,rejected",
            'replay'=>'required|min:5|max:2000',
            'reward_type_id'=>'required|exists:reward_types,id',
            'user_id'=>'required|exists:users,id',
        ];
    }
}
