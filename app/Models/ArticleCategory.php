<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory, TranslationsTrait;

    protected $table = 'article_categories';

    protected $guarded = [
        'id',
    ];

    public function getTitleAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->title_ar : $this->title_en;
    }

    public function articles(){
        return $this->hasMany(Article::class,'category_id');
    }
}
