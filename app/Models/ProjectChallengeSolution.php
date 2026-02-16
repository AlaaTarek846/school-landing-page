<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectChallengeSolution extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getTitleAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->title_ar : $this->title_en;
    }


    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
