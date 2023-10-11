<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

final class SiteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'urls' => ['required', 'json']
        ];
    }
}
