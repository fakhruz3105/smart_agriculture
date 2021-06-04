<?php

namespace App\Domains\Auth\Http\Requests\Backend\Water;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'status' => 'required|in:on,off'
        ];
    }
}
