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
            "name_ar"     => $this->name_ar,
            "name_en"     => $this->name_en,
            "job_ar"     => $this->job_ar,
            "job_en"     => $this->job_en,
            "description_ar"     => $this->description_ar,
            "description_en"     => $this->description_en,
            "media"     => $this->media,
            "status" => $this->status,
        ];
    }
}
