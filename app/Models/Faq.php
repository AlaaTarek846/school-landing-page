<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory, TranslationsTrait;

    protected $table = 'faqs';

    protected $guarded = [];

    public function getTitleAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

    public function getDescriptionAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

}