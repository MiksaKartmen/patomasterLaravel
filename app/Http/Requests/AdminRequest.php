<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $tableName = $this->route()->uri();


        $string = lcfirst(str_replace("admin", "", $tableName));

        $words = preg_split('/(?=[A-Z])/', $string, -1, PREG_SPLIT_NO_EMPTY);

        if(count($words)>1){
            if(substr($words[1], -1) == "y"){
                $result = $words[0]."_".substr(lcfirst($words[1]), 0, -1 )."ies";
            }
            else{
                $result = $words[0]."_".lcfirst($words[1])."s";
            }
        }
        else{
            if(substr($words[0], -1) == "y"){
                $result = substr($words[0], 0,-1)."ies";
            }
            else{
                $result = $words[0]."s";
            }
        }

        switch ($result) {
            case 'employees':
                return [
                    'name' => 'required|string|min:3',
                    'surname' => 'required|string|min:4',
                    'biography' => 'required|string|max:100',
                    'image' => 'required|file|mimes:jpg,png|max:2048',
                    'employee_role_id' => 'required|string|notIn:0'
                ];
            case 'galleries':
                return [
                    'title' => 'required',
                ];
            case 'gallery_images':
                return [
                    'src' => 'required|file|mimes:jpg,png|max:2048',
                    'gallery_id' => 'required|string|notIn:0'
                ];
            case 'locations':
                return [
                    'state' => 'required|string',
                    'city' => 'required|string',
                    'street' => 'required|string',
                    'street_number' => 'required|alpha_num',
                    'floor' => 'required|integer|min:1'
                ];
            case 'meal_times':
                return [
                    'name' => 'required|string|min:3',
                    'description' => 'required|string|max:100',
                    'time_from' => 'required|date_format:h:i:s',
                    'time_to' => 'required|date_format:h:i:s'
                ];
            case 'menu_categories':
                return [
                    'name' => 'required|string|min:3',
                    'sub_category' => 'required|string|notIn:0'
                ];
            case 'menu_items':
                return [
                    'name' => 'required|string|min:3',
                    'description' => 'required|string|max:100',
                    'image' => 'required|file|mimes:jpg,png|max:2048',
                    'menu_category_id' => 'required|string|notIn:0'
                ];
            case 'href':
                return [
                    'href' => 'required|alpha|min:3|lowercase',
                    'title' => 'required|string|min:3|uppercase',
                ];
            case 'prices':
                return [
                    'price' => 'required|decimal',
                    'menu_item_id' => 'required|string|notIn:0',
                ];
            case 'restaurant_informations':
                return [
                    'email' => 'required|email',
                    'phone' => [
                        'required',
                        'regex:/^\+?(\d{1,3})?[-. (]?\d{3}[-. )]?\d{3}[-. ]?\d{4}$/'
                    ],
                    'location_id' => 'required|string|notIn:0',
                ];
            case 'tables':
                return [
                    'name' => 'required|string|min:3',
                    'capacity' => 'required|integer|min:2',
                ];
            case 'user_images':
                return [
                    'src' => 'required|file|mimes:jpg,png|max:2048',
                    'user_id' => 'required|string|notIn:0'
                ];
            case 'users':
                return [
                    'name' => 'required|string|min:3',
                    'surname' => 'required|string|min:4',
                    'email' => 'required|email',
                    'password' => ['required','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'],
                    'role_id' => 'required|string|notIn:0'
                ];
            case 'working_hours':
                return [
                    'working_from' => 'required|date_format:h:i:s',
                    'working_to' => 'required|date_format:h:i:s',
                ];
            default:
                return [
                    'name' => 'required|string|min:3',
                ];
        }
    }

    public function messages(): array
    {
        return [
            'surname.string' => 'Wrong format for surname. Example: Jovanovic',

            'email.email' => 'Wrong format for email. Example: mihajlo@gmail.com',

            'phone.regex' => 'Wrong format for phone. Example: +1-814-921-0296',

            'password.regex' => 'Wrong format for password. Example: Password123',

        ];
    }
}
