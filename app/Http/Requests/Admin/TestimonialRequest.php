<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            "name_ar" => "required|string|max:200",
            "name_en" => "required|string|max:200",
            "description_ar" => "required|string|max:300",
            "description_en" => "required|string|max:300",
            "job_ar" => "nullable|string|max:200",
            "job_en" => "nullable|string|max:200",
            "status" =>  "required|boolean",
            'image' => [$this->method() == "PUT" ? 'nullable':'required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ];
    }
}
