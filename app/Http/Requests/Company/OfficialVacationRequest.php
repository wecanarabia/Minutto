<?php

namespace App\Http\Requests\Company;

use App\Rules\DeterminEndDate;
use Illuminate\Foundation\Http\FormRequest;

class OfficialVacationRequest extends FormRequest
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
        return [
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'english_note' => 'required|min:4|max:10000',
            'arabic_note' => 'required|min:4|max:10000',
            'from'=>'required|date',
            'to'=>['required','date',new DeterminEndDate($this->from)],

        ];
    }
}
