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
        $type = 'link';
        $content = $this->link;
        if ($this->image) {
            $type = 'image';
            $content = \Illuminate\Support\Facades\Storage::url($this->image);
        } elseif ($this->video) {
            $type = 'video';
            $content = \Illuminate\Support\Facades\Storage::url($this->video); 
        }

        return [
            'id' => $this->id,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'type' => $type,
            'content' => $content,
            'image' => $this->image ? \Illuminate\Support\Facades\Storage::url($this->image) : null,
            'video' => $this->video ? \Illuminate\Support\Facades\Storage::url($this->video) : null,
            'link' => $this->link,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
