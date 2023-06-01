<?php

namespace App\Http\Requests\Company;

use App\Models\Role;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $roles = Role::where('company_id',Auth::user()->company_id)->pluck('id')->toArray();
        array_push($roles,'');
        return [
            'name'=>'required|min:5|max:255',
            'email'=>'required|min:5|email|max:255|unique:company_admins,email,'.$this->id,
            'password' => ['required_without:id', 'nullable',Password::min(8)],
            'image'=>'required_without:id|mimes:jpg,jpeg,gif,png',
            'phone' => 'required|min:9|regex:/^([0-9\s\-\+\(\)]*)$/|unique:company_admins,phone,'.$this->id,
            'role_id' => [ 'nullable', Rule::in($roles)],
        ];
    }
}
