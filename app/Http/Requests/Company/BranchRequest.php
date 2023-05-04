<?php

namespace App\Http\Requests\Company;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
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
        $users = User::where('branch_id',$this->id)->pluck('id')->toArray();
        array_push($users,'');
        return [
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'location' => 'required|min:4|max:255',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'shifts'=>'array|min:1',
            'shifts.*'=>'numeric|exists:shifts,id',
            'branch_head' => [ 'nullable', Rule::in($users)],

        ];
    }
}
