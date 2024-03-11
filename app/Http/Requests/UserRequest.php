<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'PATCH') {

            $password_rules = 'nullable|required_with:password_confirmation|string|confirmed';
            $email_rules = 'email';
        }
        else {
            $password_rules = 'required_with:password_confirmation|string|confirmed';
            $email_rules = 'unique:users,email';
        }

        return [
            'name' => 'required',
            'roles' => 'required',
            'kelamin' => 'required',
            'foto' => 'nullable|mimes:jpg,jpeg,bmp,png',
            'password' => $password_rules,
            'email' => $email_rules,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.unique'  => 'Email harus diisi dan tidak boleh sama',
            'password.confirmed'  => 'Password tidak sama.',
            'password.required_with'  => 'Password tidak sama.',
            'password.string'  => 'Password harus teks',
        ];
    }
}
