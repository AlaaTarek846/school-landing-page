<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PolicyResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"              => $this->id,
            "description"     => $this->description,
            "type"            => $this->type,
        ];
    }
}
