<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqSectionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "title"     => $this->current_translation?->title,
            "description"     => $this->current_translation?->description,
            "media"     => $this->media,
            "status" => $this->status,
        ];
    }
}
