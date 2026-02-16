<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectChallengeSolutionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"          => $this->id,
            "title"       => $this->title_ar,
            "status"      => $this->status,
            "project"     => new ProjectResource($this->whenLoaded('project')),
            "sort"        => $this->sort,
            "project_id"  => $this->project_id
        ];
    }
}
