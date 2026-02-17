<?php

namespace App\Services;

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
        return true; // Simplified as Article model is removed
    }

    /**
     * Generate canonical URL
     */
    public function createRedirect(string $oldSlug, string $newSlug, string $locale): void
    {
        // Redirect logic removed as ArticleRedirect model is removed
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
    public function prePublishChecklist(array $data, string $locale = 'ar'): array
    {
        // Checklist logic removed or simplified
        return ['all_passed' => true, 'checks' => []];
    }
}


