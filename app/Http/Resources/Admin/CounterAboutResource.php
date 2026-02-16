<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CounterAboutResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "title"     => $this->current_translation?->title,
            "icon"     => $this->icon,
            "status" => $this->status,
        ];
    }
}
