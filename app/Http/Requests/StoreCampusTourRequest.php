<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampusTourRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'image' => 'nullable|required_without_all:video,link|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|required_without_all:image,link|string',
            'link' => 'nullable|required_without_all:image,video|url',
        ];
    }
}
