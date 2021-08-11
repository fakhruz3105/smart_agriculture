<?php

namespace App\Http\Requests\Backend\Water;

use Illuminate\Foundation\Http\FormRequest;


class EditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'start' => 'required|date_format:H:i',
            'end'   => 'required|date_format:H:i|after:start',
        ];
    }
}
