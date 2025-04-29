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
            'display_name' => ['required' , 'regex:^[^\s]*$'],
            'first_name' => ['required'] ,
            'last_name' => ['required'],
            'gmail' => ['required' , Rule::unique('user' , 'gmail')],
            'phone_number'=> ['required' , 'numeric' , 'min:11' , 'max:11'],
            'age' => ['required','numeric'],
            'bio' => ['nullable']
        ];
    }
}
