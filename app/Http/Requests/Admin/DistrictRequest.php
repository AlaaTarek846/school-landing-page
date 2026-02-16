<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "translations"         => "nullable|array",
            "translations.*.title" => "required|string",
            "area_id" => "required|exists:areas,id",
            "city_id" => "required|exists:cities,id",
            "status" =>  "required|boolean",
        ];
    }
}
