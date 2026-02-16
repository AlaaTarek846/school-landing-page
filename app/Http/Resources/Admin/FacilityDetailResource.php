<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FacilityDetailResource extends JsonResource
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
            'count' => $this->count,
            'facility_id' => $this->facility_id,
            'facility' => new FacilityResource($this->whenLoaded('facility')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
