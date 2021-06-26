<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_type_id'          => 'required|exists:users_types,id',
            'first_name'            => 'required',
            'last_name'             => 'required',
            'email'                 => 'required|email:rfc,dns|unique:users',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
