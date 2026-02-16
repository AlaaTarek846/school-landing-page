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
            "name" => "required|string|max:200",
            "description" => "required|string|max:300",
            "job" => "nullable|string|max:200",
            "status" =>  "required|boolean",
            'image' => [$this->method() == "PUT" ? 'nullable':'required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ];
    }
}
