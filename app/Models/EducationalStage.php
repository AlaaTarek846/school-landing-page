<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalStage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'image',
    ];

    public function classes()
    {
        return $this->hasMany(ClassRoom::class, 'educational_stage_id');
    }
}
