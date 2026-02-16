<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, TranslationsTrait, Sluggable;

    protected $guarded = ['id'];


    public function getTitleAttribute()
    {
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

    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }



}