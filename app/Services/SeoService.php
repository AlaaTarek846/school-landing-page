<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticleRedirect;
use Illuminate\Support\Str;

class SeoService
{
    /**
     * Generate SEO slug from title
     */
    public function generateSlug(string $title, string $locale = 'ar'): string
    {
        if ($locale === 'ar') {
            return \App\Helper\SlugHelper::slug($title);
        }
        return Str::slug($title);
    }

    /**
     * Validate and sanitize slug
     */
    public function sanitizeSlug(string $slug): string
    {
        // Remove spaces and special characters, keep only alphanumeric and hyphens
        $slug = preg_replace('/[^a-z0-9\-_\p{Arabic}]/iu', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        return trim($slug, '-');
    }

    /**
     * Check if slug is unique for a specific locale
     */
    public function isSlugUnique(string $slug, string $locale, ?int $excludeId = null): bool
    {
        $column = $locale === 'ar' ? 'slug_ar' : 'slug_en';
        $query = Article::where($column, $slug);
        
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        
        return !$query->exists();
    }

    /**
     * Generate canonical URL
     */
    public function generateCanonicalUrl(Article $article, string $locale = 'ar'): string
    {
        $slug = $locale === 'ar' ? $article->slug_ar : $article->slug_en;
        return url('/articles/blog-details/' . $slug);
    }

    /**
     * Generate hreflang URLs
     */
    public function generateHreflangUrls(Article $article): array
    {
        $urls = [];
        
        if ($article->slug_ar) {
            $urls['ar'] = url('/articles/blog-details/' . $article->slug_ar);
        }
        
        if ($article->slug_en) {
            $urls['en'] = url('/articles/blog-details/' . $article->slug_en);
        }
        
        return $urls;
    }

    /**
     * Create redirect when slug changes
     */
    public function createRedirect(Article $article, string $oldSlug, string $newSlug, string $locale): void
    {
        if ($oldSlug === $newSlug || empty($oldSlug)) {
            return;
        }

        ArticleRedirect::create([
            'article_id' => $article->id,
            'old_slug_ar' => $locale === 'ar' ? $oldSlug : null,
            'old_slug_en' => $locale === 'en' ? $oldSlug : null,
            'new_slug_ar' => $locale === 'ar' ? $newSlug : null,
            'new_slug_en' => $locale === 'en' ? $newSlug : null,
            'locale' => $locale,
            'redirect_type' => 301,
        ]);
    }

    /**
     * Validate SEO title length
     */
    public function validateSeoTitleLength(string $title, string $locale = 'ar'): array
    {
        $length = mb_strlen($title);
        $minLength = 30;
        $maxLength = 60;
        
        if ($length === 0) {
            return ['status' => 'fail', 'message' => 'SEO Title is required'];
        }
        
        if ($length < $minLength) {
            return [
                'status' => 'fail',
                'message' => "SEO Title is too short ({$length} chars). Minimum: {$minLength} chars"
            ];
        }
        
        if ($length > $maxLength) {
            return [
                'status' => 'warning',
                'message' => "SEO Title is too long ({$length} chars). Optimal: {$maxLength} chars"
            ];
        }
        
        return ['status' => 'pass', 'message' => "SEO Title length is optimal ({$length} chars)"];
    }

    /**
     * Validate meta description length
     */
    public function validateMetaDescriptionLength(string $description, string $locale = 'ar'): array
    {
        $length = mb_strlen($description);
        $minLength = 120;
        $maxLength = 160;
        
        if ($length === 0) {
            return ['status' => 'fail', 'message' => 'Meta Description is required'];
        }
        
        if ($length < $minLength) {
            return [
                'status' => 'fail',
                'message' => "Meta Description is too short ({$length} chars). Minimum: {$minLength} chars"
            ];
        }
        
        if ($length > $maxLength) {
            return [
                'status' => 'warning',
                'message' => "Meta Description is too long ({$length} chars). Optimal: {$maxLength} chars"
            ];
        }
        
        return ['status' => 'pass', 'message' => "Meta Description length is optimal ({$length} chars)"];
    }

    /**
     * Extract image metadata
     */
    public function extractImageMetadata($image): array
    {
        if (!$image || !file_exists($image->getRealPath())) {
            return ['width' => null, 'height' => null, 'mime' => null];
        }

        $imageInfo = getimagesize($image->getRealPath());
        
        return [
            'width' => $imageInfo[0] ?? null,
            'height' => $imageInfo[1] ?? null,
            'mime' => $imageInfo['mime'] ?? $image->getMimeType(),
        ];
    }

    /**
     * Pre-publish checklist
     */
    public function prePublishChecklist(Article $article, string $locale = 'ar'): array
    {
        $checks = [];
        $allPassed = true;

        // Check required fields
        $titleField = $locale === 'ar' ? 'title_ar' : 'title_en';
        $contentField = $locale === 'ar' ? 'content_ar' : 'content_en';
        $seoTitleField = $locale === 'ar' ? 'seo_title_ar' : 'seo_title_en';
        $metaDescField = $locale === 'ar' ? 'meta_description_ar' : 'meta_description_en';
        $slugField = $locale === 'ar' ? 'slug_ar' : 'slug_en';
        $focusKeyphraseField = $locale === 'ar' ? 'focus_keyphrase_ar' : 'focus_keyphrase_en';

        // Title check
        if (empty($article->$titleField)) {
            $checks[] = ['field' => 'title', 'status' => 'fail', 'message' => 'Title is required'];
            $allPassed = false;
        } else {
            $checks[] = ['field' => 'title', 'status' => 'pass', 'message' => 'Title is set'];
        }

        // Content check
        if (empty($article->$contentField)) {
            $checks[] = ['field' => 'content', 'status' => 'fail', 'message' => 'Content is required'];
            $allPassed = false;
        } else {
            $checks[] = ['field' => 'content', 'status' => 'pass', 'message' => 'Content is set'];
        }

        // SEO Title check
        if (empty($article->$seoTitleField)) {
            $checks[] = ['field' => 'seo_title', 'status' => 'warning', 'message' => 'SEO Title is recommended'];
        } else {
            $titleValidation = $this->validateSeoTitleLength($article->$seoTitleField, $locale);
            $checks[] = ['field' => 'seo_title', 'status' => $titleValidation['status'], 'message' => $titleValidation['message']];
            if ($titleValidation['status'] === 'fail') {
                $allPassed = false;
            }
        }

        // Meta Description check
        if (empty($article->$metaDescField)) {
            $checks[] = ['field' => 'meta_description', 'status' => 'warning', 'message' => 'Meta Description is recommended'];
        } else {
            $metaValidation = $this->validateMetaDescriptionLength($article->$metaDescField, $locale);
            $checks[] = ['field' => 'meta_description', 'status' => $metaValidation['status'], 'message' => $metaValidation['message']];
            if ($metaValidation['status'] === 'fail') {
                $allPassed = false;
            }
        }

        // Slug check
        if (empty($article->$slugField)) {
            $checks[] = ['field' => 'slug', 'status' => 'fail', 'message' => 'Slug is required'];
            $allPassed = false;
        } else {
            $checks[] = ['field' => 'slug', 'status' => 'pass', 'message' => 'Slug is set'];
        }

        // Featured Image check
        if (!$article->media) {
            $checks[] = ['field' => 'featured_image', 'status' => 'fail', 'message' => 'Featured Image is required'];
            $allPassed = false;
        } else {
            $checks[] = ['field' => 'featured_image', 'status' => 'pass', 'message' => 'Featured Image is set'];
        }

        // Category check
        if (!$article->category_id) {
            $checks[] = ['field' => 'category', 'status' => 'fail', 'message' => 'Category is required'];
            $allPassed = false;
        } else {
            $checks[] = ['field' => 'category', 'status' => 'pass', 'message' => 'Category is set'];
        }

        // Focus Keyphrase check
        if (empty($article->$focusKeyphraseField)) {
            $checks[] = ['field' => 'focus_keyphrase', 'status' => 'warning', 'message' => 'Focus Keyphrase is recommended'];
        } else {
            $checks[] = ['field' => 'focus_keyphrase', 'status' => 'pass', 'message' => 'Focus Keyphrase is set'];
        }

        return [
            'all_passed' => $allPassed,
            'checks' => $checks,
        ];
    }
}


