<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"          => $this->id,
            "title"       => $this->title_ar,
            "description" => $this->description_ar,
            "quote"       => $this->quote_ar,
            "status"      => $this->status,
            'image'       => $this->image,
        ];
    }
}
