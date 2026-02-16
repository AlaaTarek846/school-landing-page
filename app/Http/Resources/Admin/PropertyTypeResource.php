<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyTypeResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"          => $this->id,
            "title"       => $this->title,
            "description" => $this->description,
            "type"        => $this->type,
            "media"       => $this->media,
            "status"      => $this->status,
            "created_at"  => $this->created_at->format("Y-m-d H:i"),
        ];
    }
}
