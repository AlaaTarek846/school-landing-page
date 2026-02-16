<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceFaqResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"          => $this->id,
            "title"       => $this->title_ar,
            "description" => $this->description_ar,
            "status"      => $this->status,
            "service"     => new ServiceResource($this->whenLoaded('service')),
            "sort"        => $this->sort
        ];
    }
}
