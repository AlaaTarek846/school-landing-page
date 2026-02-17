<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusTour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'image',
        'video',
        'link',
        'type',
        'campus_tour_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(CampusTourCategory::class, 'campus_tour_category_id');
    }
}
