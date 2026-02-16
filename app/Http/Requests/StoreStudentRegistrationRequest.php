<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRegistrationRequest extends FormRequest
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
            'student_name' => 'required|string|max:255',
            'educational_stage_id' => 'required|exists:educational_stages,id',
            'class_id' => 'required|exists:classes,id',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
        ];
    }
}
