<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [
        'id',
    ];
    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }

    public function getTitleAttribute(){
        return app()->getLocale() == 'ar' ? $this->title_ar : $this->title_en;
    }

    public function getSlugAttribute(){
        return app()->getLocale() == 'ar' ? $this->slug_ar : $this->slug_en;
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

}
