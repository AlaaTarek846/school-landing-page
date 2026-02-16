<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TwoAboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            "translations"         => "nullable|array",
            "translations.*.title" => "required|string|max:200",
            "translations.*.description" => "required|string|max:1000",
            "link" => "required|string|url|max:500",
            'image' => [$this->method() == "PUT" ? 'nullable':'required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ];
    }
}
