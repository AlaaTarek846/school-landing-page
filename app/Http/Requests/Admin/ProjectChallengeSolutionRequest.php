<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectChallengeSolutionRequest extends FormRequest
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
             Rule::unique('project_challenge_solutions')
                    ->where(function ($query) {
                        return $query->where('project_id', $this->input('project_id'));
                    })
                    ->ignore($this->project_challenge_solution?->id),
        ],
        "title_en" => [
            "required",
            "string",
            "min:5",
            "max:191",
            Rule::unique('project_challenge_solutions')
                    ->where(function ($query) {
                        return $query->where('project_id', $this->input('project_id'));
                    })
                    ->ignore($this->project_challenge_solution?->id),
        ],
            "status"                     => "required|boolean",
            "project_id"                 => "required|exists:projects,id",
             "sort" => [
                "required",
                "integer",
                "between:1,15",
                Rule::unique('project_challenge_solutions')
                    ->where(function ($query) {
                        return $query->where('project_id', $this->input('project_id'));
                    })
                    ->ignore($this->project_challenge_solution?->id),
                ],


        ];
    }

   

}
