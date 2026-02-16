<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CounterSectionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "title"     => $this->title,
            "icon"     => $this->icon,
            "status" => $this->status,
        ];
    }
}
