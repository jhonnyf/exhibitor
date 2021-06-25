<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $rules = [
            'id'         => 'required|exists:users',
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => [
                'required',
                'email:rfc,dns',
                Rule::unique('users')->ignore($request->id),
            ],

        ];

        if (isset($request->password)) {
            $rules['password']              = 'required|min:6|confirmed';
            $rules['password_confirmation'] = 'required';
        }

        return $rules;
    }
}
