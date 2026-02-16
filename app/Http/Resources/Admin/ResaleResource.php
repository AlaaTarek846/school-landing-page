<?php

namespace App\Http\Resources\Admin;

use App\Models\Area;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ResaleResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"          => $this->id,
            "title"       => $this->title_ar,
            "description" => $this->description_ar,
            "type"        => $this->type,
            "bathroom"    => $this->bathroom,
            "bedroom"     => $this->bedroom,
            "living_room" => $this->living_room,
            "kitchen"     => $this->kitchen,
            "garden"      => $this->garden,
            "floor"       => $this->floor,
            "parking"     => $this->parking,
            "number_house"   => $this->number_house,
            "area"        => new AreaResource($this->area),
            "photo"       => $this->photo,
            "media"       => $this->media,
            "status"      => $this->status,
        ];
    }
}
//
//            "project_id"                 => "required|exists:projects,id",
//            "area_id"                 => "required|exists:areas,id",
//
//            'image' => [$this->method() == "PUT" ? 'nullable' : 'required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],