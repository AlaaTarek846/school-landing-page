<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
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

}
