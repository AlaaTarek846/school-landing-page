<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceFaqRequest extends FormRequest
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
           "title_ar" => [
            "required",
            "string",
            "min:5",
            "max:191",
            Rule::unique('service_faqs', 'title_ar')->ignore($this->service_faq?->id),
        ],
        "title_en" => [
            "required",
            "string",
            "min:5",
            "max:191",
            Rule::unique('service_faqs', 'title_en')->ignore($this->service_faq?->id),
        ],
            "description_ar"             => "required|string|min:5",
            "description_en"             => "required|string|min:5",
            "status"                     => "required|boolean",
            "service_id"                 => "required|exists:services,id",
             "sort" => [
                "required",
                "integer",
                "between:1,15",
                Rule::unique('service_faqs')
                    ->where(function ($query) {
                        return $query->where('service_id', $this->input('service_id'));
                    })
                    ->ignore($this->service_faq?->id),
                ],


        ];
    }

   

}
