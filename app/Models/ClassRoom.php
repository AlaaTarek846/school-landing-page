<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->title_ar : $this->title_en;
    }

    protected $fillable = [
        'title_ar',
        'title_en',
        'educational_stage_id',
    ];

    public function educationalStage()
    {
        return $this->belongsTo(EducationalStage::class, 'educational_stage_id');
    }

    public function studentRegistrations()
    {
        return $this->hasMany(StudentRegistration::class, 'class_id');
    }
}
