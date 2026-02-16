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
            "name_ar"      => $this->name_ar,
            "name_en"      => $this->name_en,
            "job_ar"      => $this->job_ar,
            "job_en"      => $this->job_en,
            "media"     => $this->media,
        ];
    }
}
