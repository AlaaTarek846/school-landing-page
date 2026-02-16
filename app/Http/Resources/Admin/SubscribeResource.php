<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscribeResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"        => $this->id,
            "email"      => $this->email,
            "created_at" => $this->created_at->format("Y-m-d H:i"),
        ];
    }
}
