<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class AdvanceRequest extends FormRequest
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
        $this['status'] = json_decode($this['status'],true);
        return [
            'value'=>'required_if:status.en,approve|numeric|min:0|declined_if:status.en,waiting|declined_if:status.en,rejected',
            'note'=>'required|min:4|max:2000',
            'replay'=>'required|min:4|max:2000',
            'req_date'=>'required|date',
            'status.en'=>"required|in:waiting,approve,rejected",
        ];
    }
}
