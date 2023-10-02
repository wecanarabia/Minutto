<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class BonusRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $this['type'] = json_decode($this->type,true);
        return [
            'date'=>'required|date',
            'value'=>'required|integer|min:0',
            'note'=>'required|min:5|max:2000',
            'file'=>'nullable|mimes:jpg,gif,jpeg,png,mp4,pdf,txt,mkv,flv,docs,doc,3gb,xlsx,pptx|max:4000',
            'type.en'=>"in:amount,vacation days",
            'user_id'=>'required|exists:users,id',
        ];
    }
}
