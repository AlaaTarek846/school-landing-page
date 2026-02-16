<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"              => $this->id,
            "title"           => $this->title,
            "description"     => $this->description,
            "status"          => $this->status,
        ];
    }
}
