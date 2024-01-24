<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminactivityRequest extends FormRequest
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
