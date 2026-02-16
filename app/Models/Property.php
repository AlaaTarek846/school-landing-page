<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory,Sluggable;
    protected $guarded = [
        'id',
    ];

    public function media()
    {
        return $this->morphMany(File::class, 'uploadable');
    }

    public function getTitleAttribute(){
        return app()->getLocale() == 'ar' ? $this->title_ar : $this->title_en;
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getSlugAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->slug_ar  : $this->slug_en;
    }

    public function sluggable(): array
    {
        return [
            'slug_ar' => [
                'source' => 'title_ar'
            ],
            'slug_en' => [
                'source' => 'title_en'
            ]
        ];
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
    public function pdf()
    {
        return $this->morphOne(File::class, 'uploadable')->where('identifier', 'pdf');
    }
    public function photo()
    {
        return $this->morphOne(File::class, 'uploadable')->where('identifier', 'photo');
    }
    public function images()
    {
        return $this->morphMany(File::class, 'uploadable')->where('identifier', 'images');
    }
}
