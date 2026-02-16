<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleRedirect extends Model
{
    use HasFactory;

    protected $table = 'article_redirects';

    protected $fillable = [
        'article_id',
        'old_slug_ar',
        'old_slug_en',
        'new_slug_ar',
        'new_slug_en',
        'locale',
        'redirect_type',
        'hits',
    ];

    protected $casts = [
        'redirect_type' => 'integer',
        'hits' => 'integer',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
