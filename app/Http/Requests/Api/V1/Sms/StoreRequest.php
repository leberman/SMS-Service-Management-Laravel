<?php

namespace App\Http\Requests\Api\V1\Sms;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules() :array
    {
        return [
            'user_id' => [
                'integer'
            ],
            'message' => [
                'required',
                'string',
                'max:120'
            ],
        ];
    }
}
