<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:15',
            'surname'=>'required|string|min:4|max:25',
            'email'=>'required|email:rfc,dns',
            'password'=>['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Your name is required',
            'name.string' => 'Wrong format for your name. Example: Mihajlo',
            'name.min' => 'Your name must be at least 3 letters long',

            'surname.required' => 'Your surname is required',
            'surname.string' => 'Wrong format for your name. Example: Jovanovic',
            'surname.min' => 'Your surname must be at least 4 letters long',

            'email.required' => 'Your email is required',
            'email.email'=>'Wrong format for your email. Example: mihajlo@gmail.com',

            'password.required' => 'Your password is required',
            'password.alpha_num' => 'Your password must contain at least 8 letters and numbers',
        ];
    }
}
