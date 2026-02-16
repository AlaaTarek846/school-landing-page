<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"         => $this->id,
            "title"      => $this->title_ar,
            "description"=> $this->description_ar,
            "year"       => $this->year,
            "company"    => new CompanyResource($this->company),
            "media"      => $this->media,
            "status"     => $this->status,
        ];
    }
}
