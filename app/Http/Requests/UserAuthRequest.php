<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    => 'required|email:rfc|exists:users',
            'password' => 'required|min:6|',
        ];
    }
}
