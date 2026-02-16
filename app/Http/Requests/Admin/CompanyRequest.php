<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            "title_ar" => "required|string|max:200" ,
            "title_en" => "required|string|max:200" ,
            "status" => "required|boolean",
            'image' => [$this->method() == "PUT" ? 'nullable' : 'required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
    public function validated($key = null, $default = null)
    {
        return array_merge($this->validator->validated(),[
            'property_type_id'           =>  2,
        ]);
    }
}
