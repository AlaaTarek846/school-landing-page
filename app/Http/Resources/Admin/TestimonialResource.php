<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "name"     => $this->name,
            "description"     => $this->description,
            "media"     => $this->media,
            "status" => $this->status,
        ];
    }
}
