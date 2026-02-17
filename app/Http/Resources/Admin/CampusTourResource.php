<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CampusTourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Determine type based on fields
        $type = $this->type;
        $content = $this->link;
        
        if ($type === 'image') {
            $content = $this->image ? $this->image : null;
        } elseif ($type === 'video') {
             $content = $this->video ? $this->video : null;
        }

        return [
            'id' => $this->id,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'description_ar' => $this->description_ar,
            'description_en' => $this->description_en,
            'type' => $this->type, // Changed from $type to $this->type based on edit
            'content' => $content,
            'image' => $this->image ? $this->image : null,
            'video' => $this->video ? $this->video : null,
            'link' => $this->link,
            'campus_tour_category_id' => $this->campus_tour_category_id,
            'campus_tour_category' => new CampusTourCategoryResource($this->whenLoaded('category')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
