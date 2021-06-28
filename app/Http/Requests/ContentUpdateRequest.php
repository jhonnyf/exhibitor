<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'    => 'required|exists:contents',
            'title' => 'required',
        ];
    }
}
