<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TwoAboutResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "title"     => $this->current_translation?->title,
            "description"     => $this->current_translation?->description,
            "media"     => $this->media,
        ];
    }
}
