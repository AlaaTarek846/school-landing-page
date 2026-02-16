<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ResaleRequest extends FormRequest
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
            "description_en" => "required|string" ,
            "description_ar" => "required|string" ,
            "status" => "required|boolean",
            "type"     => "required|in:apartment,villa",
            "area_id"                 => "required|exists:areas,id",
            "bathroom" => "required|integer",
            "bedroom" => "required|integer",
            "living_room" => "required|integer",
            "kitchen" => "required|integer",
            "garden" => "required|integer",
            "floor" => "required|integer",
            "parking" => "required|integer",
            "number_house" => "required|integer",
            'photo' => [$this->method() == "PUT" ? 'nullable' : 'required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'pdf'   => [$this->method() == "PUT" ? 'nullable':'required','file','mimes:pdf'],
            "images" => "nullable|array",
            "images.*" => "nullable|file|mimes:png,svg,webp,jpg,jpeg|max:2048",

        ];
    }
    public function validated($key = null, $default = null)
    {
        return array_merge($this->validator->validated(),[
            'property_type_id'           =>  1,
        ]);
    }
}
