<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }
    public function rules(): array
    {
        return [
            //
        ];
    }
}
