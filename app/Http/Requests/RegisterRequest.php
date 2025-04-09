<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|between:2,12',
            'email' => 'required|between:5,40|unique:users,email|email',
            'password' => 'required|regex:/^[a-zA-Z0-9]+$/|between:8,20|confirmed',
        ];

    }
}
