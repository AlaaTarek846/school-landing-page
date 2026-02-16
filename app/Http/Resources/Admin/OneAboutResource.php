<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OneAboutResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "title"     => $this->title_ar,
            "description"     => $this->current_translation?->description,
            "firstPhoto"     => $this->firstPhoto,
        ];
    }
}
