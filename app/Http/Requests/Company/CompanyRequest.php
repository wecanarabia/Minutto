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
            'english_name' => 'sometimes|min:4|max:255',
            'arabic_name' => 'sometimes|min:4|max:255',
            'english_description' => 'sometimes|min:4|max:10000',
            'arabic_description' => 'sometimes|min:4|max:10000',
            'employees_count'=>'sometimes|numeric|min:0',
            'leaves_count'=>'sometimes|numeric|min:0',
            'holidays_count'=>'sometimes|numeric|min:0',
            'sick_leaves'=>'sometimes|numeric|min:0',
            'advances_percentage'=>'sometimes|numeric|min:0',
            'extra_rate'=>'sometimes|numeric|min:0',
            'subscription_id'=>'sometimes|exists:subscriptions,id',
            'timezone'=>['sometimes', Rule::in($timezones)],
            'grace_period'=>'sometimes|date_format:H:i:s',
        ];
    }
}
