<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class AlertRequest extends FormRequest
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
        $this['type'] = json_decode($this->type,true);
        return [
            'alert_date'=>'required|date',
            'punishment'=>'required|integer|declined_if:type.en,attention',
            'note'=>'required|min:5|max:2000',
            'file'=>'mimes:jpg,gif,jpeg,png,mp4,pdf,txt,mkv,flv,docs,doc,3gb,xlsx,pptx|max:4000',
            'type.en'=>"in:amount,attention,vacation days,Salary number of working days",
            'user_id'=>'required|exists:users,id',
        ];
    }
}
