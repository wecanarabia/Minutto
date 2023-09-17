<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'discount_value'=>'nullable|numeric|declined_if:status.en,disciplined|min:0',
            'note'=>'required|min:4|max:2000',
            'replay'=>'required|min:4|max:2000',
            'time_departure'=>'nullable|date_format:H:i',
            'status.en'=>"required|in:disciplined,late,absence,vacation",
        ];
    }
}
