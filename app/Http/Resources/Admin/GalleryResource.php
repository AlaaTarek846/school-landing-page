<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "media"     => $this->media,
            "status" => $this->status,
        ];
    }
}
