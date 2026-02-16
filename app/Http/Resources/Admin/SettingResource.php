<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "address"     => $this->address,
            "email"     => $this->email,
            "mobile"     => $this->mobile,
        ];
    }
}
