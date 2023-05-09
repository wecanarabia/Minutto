<?php

namespace App\Http\Requests\Company;

use DateTimeZone;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $timezones = DateTimeZone::listIdentifiers();

        return [
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'english_description' => 'required|min:4|max:10000',
            'arabic_description' => 'required|min:4|max:10000',
            'employees_count'=>'required|numeric',
            'leaves_count'=>'required|numeric',
            'holidays_count'=>'required|numeric',
            'sick_leaves'=>'required|numeric',
            'advances_percentage'=>'required|numeric',
            'extra_rate'=>'required|numeric',
            'subscription_id'=>'required|exists:subscriptions,id',
            'timezone'=>['required', Rule::in($timezones)],
            'grace_period'=>'required|date_format:H:i:s',
        ];
    }
}
