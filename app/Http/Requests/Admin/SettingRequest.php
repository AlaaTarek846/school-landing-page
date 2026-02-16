<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            "address_en" => "required|string|max:1000",
            "address_ar" => "required|string|max:1000",
            "email" => "required|string|email|max:200",
            "mobile" => "required|string|max:200",
            "twitter" => "required|string|max:200",
            "instagram" => "required|string|max:200",
            "facebook" => "required|string|max:200",
            "linkedin" => "required|string|max:200",
            "map" => "required|string|max:1000",
        ];
    }
}
