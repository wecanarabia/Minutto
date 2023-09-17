<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class ExtraRequest extends FormRequest
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
            'from'=>'required|date_format:H:i',
            'to'=>'required|date_format:H:i',
            'note'=>'required|min:4|max:2000',
            'replay'=>'required|min:4|max:2000',
            'status.en'=>"required|in:waiting,approve,rejected",
        ];
    }
}
