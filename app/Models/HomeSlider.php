<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSlider extends Model
{
    use HasFactory,TranslationsTrait;

    protected $guarded = [];

    protected $table = 'home_sliders';

    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }

    public function getTitleAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

    public function getDescriptionAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getTitleColorAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->title_color_ar : $this->title_color_en;
    }

    public function background()
    {
        return $this->morphOne(File::class, 'uploadable')->where('identifier', 'background');
    }

    public function image()
    {
        return $this->morphOne(File::class, 'uploadable')->where('identifier', 'image');
    }

}
