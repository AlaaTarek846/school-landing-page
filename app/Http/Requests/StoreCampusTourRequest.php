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
            'type' => 'required|in:image,video,link',
            'image' => 'nullable|required_if:type,image|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|required_if:type,video',
            'link' => 'nullable|required_if:type,link|url',
            'campus_tour_category_id' => 'required|exists:campus_tour_categories,id',
        ];
    }
}
