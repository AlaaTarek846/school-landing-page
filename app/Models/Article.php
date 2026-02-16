<?php

namespace App\Models;

use App\Traits\TranslationsTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, TranslationsTrait, Sluggable;

    protected $table = 'articles';

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'tags' => 'array',
        'tags_ar' => 'array',
        'tags_en' => 'array',
        'created_at' => 'datetime',
        'image_width' => 'integer',
        'image_height' => 'integer',
    ];

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

    public function category(){
        return $this->belongsTo(ArticleCategory::class,'category_id');
    }

    public function comments()
    {
        return $this->hasMany(ArticleClientQuiry::class, 'article_id');
    }

    public function media()
    {
        return $this->morphOne(File::class, 'uploadable');
    }

    public function redirects()
    {
        return $this->hasMany(ArticleRedirect::class);
    }

    public function getTitleAttribute(){
        $locale = app()->getLocale();
        $title = $locale == 'ar' ? $this->getRawOriginal('title_ar') : $this->getRawOriginal('title_en');
        return (string) ($title ?? '');
    }

    public function getContentAttribute(){
        $locale = app()->getLocale();
        $content = $locale == 'ar' ? $this->getRawOriginal('content_ar') : $this->getRawOriginal('content_en');
        return (string) ($content ?? '');
    }

    public function getSlugAttribute(){
        $locale = app()->getLocale();
        $slug = $locale == 'ar' ? $this->getRawOriginal('slug_ar') : $this->getRawOriginal('slug_en');
        // Fallback to legacy slug if new slug is empty
        if (empty($slug)) {
            $slug = $this->getRawOriginal('slug');
        }
        // If still empty, generate from title
        if (empty($slug)) {
            $title = $locale == 'ar' ? $this->getRawOriginal('title_ar') : $this->getRawOriginal('title_en');
            if (!empty($title)) {
                $seoService = new \App\Services\SeoService();
                $slug = $seoService->generateSlug($title, $locale);
            }
        }
        return (string) ($slug ?? '');
    }

    /**
     * Get safe slug for URL (with fallback to ID)
     */
    public function getSafeSlugAttribute(): string
    {
        $slug = $this->slug;
        // If slug is empty or contains spaces/unsafe characters, use ID
        if (empty($slug) || preg_match('/[\s<>"\'%]/', $slug)) {
            return (string) $this->id;
        }
        return $slug;
    }

    /**
     * Get URL-safe slug for route
     * Returns slug if safe, otherwise returns ID as fallback
     */
    public function getRouteSlugAttribute(): string
    {
        $slug = $this->slug;
        // If slug is empty or contains unsafe characters (spaces, quotes, etc.), use ID
        if (empty($slug) || preg_match('/[\s<>"\'%]/', $slug)) {
            return (string) $this->id;
        }
        // Return slug as-is (Laravel route() helper will handle URL encoding)
        return $slug;
    }

    public function getPermalinkAttribute(){
        $locale = app()->getLocale();

        if ($locale == 'ar') {
            $slug = $this->getRawOriginal('slug_ar');
            $fallbackSlug = $this->getRawOriginal('slug');
            $finalSlug = $slug ?: $fallbackSlug;
        } else {
            $slug = $this->getRawOriginal('slug_en');
            $fallbackSlug = $this->getRawOriginal('slug');
            $finalSlug = $slug ?: $fallbackSlug;
        }

        return $finalSlug ? url('/articles/blog-details/' . $finalSlug) : url()->current();
    }

    // SEO Accessors for bilingual support
    public function getFocusKeyphraseAttribute(){
        $locale = app()->getLocale();
        $legacyValue = $this->getRawOriginal('focus_keyphrase');

        if ($locale == 'ar') {
            $value = $this->getRawOriginal('focus_keyphrase_ar') ?: $legacyValue;
        } else {
            $value = $this->getRawOriginal('focus_keyphrase_en') ?: $legacyValue;
        }
        return (string) ($value ?? '');
    }

    public function getSeoTitleAttribute(){
        $locale = app()->getLocale();
        $legacyValue = $this->getRawOriginal('seo_title');

        if ($locale == 'ar') {
            $value = $this->getRawOriginal('seo_title_ar') ?: $legacyValue ?: $this->getRawOriginal('title_ar');
        } else {
            $value = $this->getRawOriginal('seo_title_en') ?: $legacyValue ?: $this->getRawOriginal('title_en');
        }
        return (string) ($value ?? '');
    }

    public function getMetaDescriptionAttribute(){
        $locale = app()->getLocale();
        $legacyValue = $this->getRawOriginal('meta_description');

        if ($locale == 'ar') {
            $value = $this->getRawOriginal('meta_description_ar');
            if (empty($value)) {
                $value = $legacyValue;
            }
            if (empty($value)) {
                $content = $this->getRawOriginal('content_ar');
                $value = \Illuminate\Support\Str::limit(strip_tags($content ?? ''), 155);
            }
        } else {
            $value = $this->getRawOriginal('meta_description_en');
            if (empty($value)) {
                $value = $legacyValue;
            }
            if (empty($value)) {
                $content = $this->getRawOriginal('content_en');
                $value = \Illuminate\Support\Str::limit(strip_tags($content ?? ''), 155);
            }
        }
        return (string) ($value ?? '');
    }

    public function getTagsAttribute(){
        $locale = app()->getLocale();
        $legacyTags = $this->getRawOriginal('tags');
        $legacyTagsArray = is_array($legacyTags) ? $legacyTags : (json_decode($legacyTags, true) ?: []);

        if ($locale == 'ar') {
            return $this->tags_ar ?: $legacyTagsArray;
        }
        return $this->tags_en ?: $legacyTagsArray;
    }

    public function getSynonymsKeyphraseAttribute(){
        $locale = app()->getLocale();
        $legacyValue = $this->getRawOriginal('synonyms_keyphrase');

        if ($locale == 'ar') {
            $value = $this->getRawOriginal('synonyms_keyphrase_ar') ?: $legacyValue;
        } else {
            $value = $this->getRawOriginal('synonyms_keyphrase_en') ?: $legacyValue;
        }
        return (string) ($value ?? '');
    }

    public function getCanonicalUrlAttribute(){
        $locale = app()->getLocale();

        if ($locale == 'ar') {
            $canonical = $this->canonical_url_ar;
            if ($canonical) {
                return $canonical;
            }
            // Generate permalink manually to avoid recursion
            $slug = $this->slug_ar ?: $this->getRawOriginal('slug_ar');
            $fallbackSlug = $this->getRawOriginal('slug');
            $finalSlug = $slug ?: $fallbackSlug;
            return $finalSlug ? url('/articles/blog-details/' . $finalSlug) : url()->current();
        }

        $canonical = $this->canonical_url_en;
        if ($canonical) {
            return $canonical;
        }
        // Generate permalink manually to avoid recursion
        $slug = $this->slug_en ?: $this->getRawOriginal('slug_en');
        $fallbackSlug = $this->getRawOriginal('slug');
        $finalSlug = $slug ?: $fallbackSlug;
        return $finalSlug ? url('/articles/blog-details/' . $finalSlug) : url()->current();
    }

    public function getAlternateHreflangAttribute(){
        $alternates = [];
        if ($this->slug_ar) {
            $alternates['ar'] = url('/articles/blog-details/' . $this->slug_ar);
        }
        if ($this->slug_en) {
            $alternates['en'] = url('/articles/blog-details/' . $this->slug_en);
        }
        return $alternates;
    }

}