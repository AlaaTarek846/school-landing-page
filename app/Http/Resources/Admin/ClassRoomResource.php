<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassRoomResource extends JsonResource
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
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'educational_stage_id' => $this->educational_stage_id,
            'educational_stage' => new EducationalStageResource($this->whenLoaded('educationalStage')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
