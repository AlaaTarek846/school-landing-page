<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CounterSection extends Model
{
    use HasFactory,TranslationsTrait;

    protected $guarded = [];

    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }

    public function getTitleAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

}