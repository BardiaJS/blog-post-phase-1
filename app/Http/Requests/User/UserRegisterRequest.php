<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRegisterRequest extends FormRequest
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
            'display_name' => ['required' , 'regex:/^\S+$/'],
            'first_name' => ['required'] ,
            'last_name' => ['required'],
            'gmail' => ['required' , Rule::unique('users' , 'gmail')],
            'password' => ['required' , 'min:6', 'regex:/^\S+$/'],
            'phone_number'=> ['required' , 'numeric'],
            'age' => ['required','numeric' , 'gt:17'],
            'bio' => ['nullable']
        ];
    }
}
