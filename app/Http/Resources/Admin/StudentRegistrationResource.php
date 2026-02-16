<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentRegistrationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_name' => $this->student_name,
            'birth_date' => $this->birth_date,
            'phone' => $this->phone,
            'email' => $this->email,
            'notes' => $this->notes,
            'pdf' => $this->pdf ? asset('storage/' . $this->pdf) : null,
            'educational_stage' => new EducationalStageResource($this->whenLoaded('educationalStage')),
            'class_room' => new ClassRoomResource($this->whenLoaded('classRoom')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
