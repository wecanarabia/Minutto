<?php

namespace App\Http\Requests\Company;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'nationality'=>'sometimes|min:4|max:255',
            'gender'=>'sometimes|in:male,female',
            'marital_status'=>'sometimes|min:4|max:255',
            'date_of_birth'=>'sometimes|date',
            'passport_identity'=>'sometimes|min:4|max:255',
            'national_identity'=>'sometimes|min:4|max:255',
            'emergency_contact'=>'sometimes|',
            'bank_name'=>'sometimes|min:4|max:255',
            'account_number'=>'sometimes|min:4|max:255',
            'bank_branch'=>'sometimes|min:4|max:255',
            'ipan'=>'sometimes|min:4|max:255',
            'swift_number'=>'sometimes|min:4|max:255',
            'career'=>'sometimes|min:4|max:255',
            'description'=>'sometimes|min:4|max:2000',
            'duration_of_contract'=>'sometimes|integer',
            'contract_expire'=>'sometimes|date',
            'branch_id'=>'sometimes|exists:branches,id',
            'branch_id'=>'sometimes|exists:departments,id',
            'shift_id'=>'sometimes|exists:shifts,id',
            'work_start'=>'sometimes|date',
            'address'=>'sometimes|min:4|max:255',
            'name'=>'sometimes|min:4|max:255',
            'last_name'=>'sometimes|min:4|max:255',
            'phone' => 'sometimes|min:9|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,phone,'.$this->id,
            'email'=>'sometimes|min:4|max:255|unique:users,email,'.$this->id,
            'password'=>['nullable',Password::min(8)],
            'image'=>'max:4000|mimes:jpg,jpeg,gif,png',
            'active'=>'sometimes|in:0,1',
        ];
    }
}
