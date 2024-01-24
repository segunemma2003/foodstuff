<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeeklydatumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
