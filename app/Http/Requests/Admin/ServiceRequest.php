<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            "title_ar"                   => "required|string|min:5|max:191|unique:services,title_ar".($this->service?','.$this->service->id:''),
            "title_en"                   => "required|string|min:5|max:191|unique:services,title_en".($this->service?','.$this->service->id:''),
            "description_ar"             => "required|string|min:5",
            "description_en"             => "required|string|min:5",
            "status"                     => "required|boolean",
            'image'                      => [$this->method() == "PUT" ? 'nullable':'required','image','mimes:jpeg,png,jpg,gif','max:2048'],
            "quote_ar"                   => "required|string|min:5",
            "quote_en"                   => "required|string|min:5",
        ];
    }

   

}
