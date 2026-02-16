<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            'url' =>  $this->url,
            "media"     => $this->media,
            "status" => $this->status,
        ];
    }
}
