<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'display_name'=> ['sometimes' , 'regex:/^\S+$/'],
            'first_name' => ['sometimes'],
            'last_name' => ['sometimes'],
            'gmail' => ['sometimes' , Rule::unique('users' , 'gmail')],
            'phone_number'=> ['sometimes' , 'numeric'],
            'age' => ['sometimes','numeric', 'gt:17'],
            'bio' => ['nullable']

        ];
    }
}
