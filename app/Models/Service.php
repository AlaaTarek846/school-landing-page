<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, TranslationsTrait, Sluggable;

    protected $fillable = [
        'status',
        'sort',
        'title_en',
        'title_ar', 
        'description_en',
        'description_ar',
        'quote_ar',
        'quote_en',
        'slug_ar',
        'slug_en',
    ];

    public function media()
    {
        return $this->morphMany(File::class, 'uploadable');
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

    public function image()
    {
        return $this->morphOne(File::class, 'uploadable')->where('identifier', 'image');
    }




    public function serviceFaqs()
    {
        return $this->hasMany(ServiceFaq::class);
    }

    public function getSlugAttribute(){
        return app()->getLocale() == 'ar' ? $this->slug_ar : $this->slug_en;
    }

}