<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"        => $this->id,
            "name"      => $this->name,
            "media"     => $this->media,
        ];
    }
}
