<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstName' => 'required|string|max:25',
            'lastName' => 'required|string|max:25',
            'email' => 'required|email',
            'ssn' => 'required|integer|min:9|max:9',
        ];
    }
}