<?php

namespace App\Http\Requests\Company;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class CompanyAdminRequest extends FormRequest
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
            'name'=>'required|min:5|max:255',
            'email'=>'required|min:5|email|max:255|unique:company_admins,email,'.$this->id,
            'password' => ['required_without:id', 'nullable',Password::min(8)],
            'image'=>'required_without:id|mimes:jpg,jpeg,gif,png',
            'phone' => 'required|min:9|regex:/^([0-9\s\-\+\(\)]*)$/|unique:company_admins,phone,'.$this->id,

        ];
    }
}
