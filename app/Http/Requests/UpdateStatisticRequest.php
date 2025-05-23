<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatisticRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string' , 'max:255'],
            'goal' => ['required', 'string' , 'max:255'],
            'icon' => ['sometimes', 'image' , 'mimes:png,jpg,jpeg,webp'],
        ];
    }
}
