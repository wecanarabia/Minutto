<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class DeductionRequest extends FormRequest
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
        return [
            'percentage'=>'required|date_format:H:i:s',
            'from'=>'required|date_format:H:i',
            'to'=>'required|date_format:H:i',

        ];
    }
}
