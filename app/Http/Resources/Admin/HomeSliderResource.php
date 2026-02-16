<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeSliderResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "title"     => $this->title,
            "description"     => $this->description,
            "media"     => $this->media,
            "status" => $this->status,
            "url" => $this->url,
        ];
    }
}
