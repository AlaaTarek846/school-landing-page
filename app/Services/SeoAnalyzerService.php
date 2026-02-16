<?php

namespace App\Services;

class SeoAnalyzerService
{
    const STATUS_PASS = 'pass';
    const STATUS_WARNING = 'warning';
    const STATUS_FAIL = 'fail';

    /**
     * Perform comprehensive SEO analysis for an article
     *
     * @param array $articleData
     * @return array
     */
    public function analyze(array $articleData): array
    {
        $results = [];

        // Analyze Focus Keyphrase in Title
        $results['focus_keyphrase_in_title'] = $this->analyzeFocusKeyphraseInTitle($articleData);

        // Analyze Focus Keyphrase in Slug
        // $results['focus_keyphrase_in_slug'] = $this->analyzeFocusKeyphraseInSlug($articleData);

        // Analyze Focus Keyphrase in Meta Description
        $results['focus_keyphrase_in_meta'] = $this->analyzeFocusKeyphraseInMeta($articleData);

        // Analyze Focus Keyphrase in Content
        $results['focus_keyphrase_in_content'] = $this->analyzeFocusKeyphraseInContent($articleData);

        // Analyze Keyphrase Density
        $results['keyphrase_density'] = $this->analyzeKeyphraseDensity($articleData);

        // Analyze SEO Title Length
        $results['seo_title_length'] = $this->analyzeSeoTitleLength($articleData);

        // Analyze Meta Description Length
        $results['meta_description_length'] = $this->analyzeMetaDescriptionLength($articleData);

        // Analyze Featured Image
        $results['featured_image'] = $this->analyzeFeaturedImage($articleData);

        // Analyze Tags
        $results['tags'] = $this->analyzeTags($articleData);

        // Analyze Category
        $results['category'] = $this->analyzeCategory($articleData);

        // Analyze Synonyms in Content
        $results['synonyms_in_content'] = $this->analyzeSynonymsInContent($articleData);

        return [
            'overall_score' => $this->calculateOverallScore($results),
            'results' => $results
        ];
    }

    /**
     * Analyze if focus keyphrase appears in title
     */
    private function analyzeFocusKeyphraseInTitle(array $articleData): array
    {
        $keyphrase = $articleData['focus_keyphrase'] ?? '';
        $title = $articleData['seo_title'] ?? '';

        if (empty($keyphrase)) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => 'لم يتم تحديد Focus Keyphrase بعد'
            ];
        }

        if (empty($title)) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => 'لم يتم كتابة SEO Title'
            ];
        }

        $containsKeyphrase = $this->containsKeyphrase($title, $keyphrase);

        return [
            'status' => $containsKeyphrase ? self::STATUS_PASS : self::STATUS_FAIL,
            'message' => $containsKeyphrase ? '✓ الكلمة المفتاحية موجودة في العنوان' : '✗ الكلمة المفتاحية غير موجودة في العنوان'
        ];
    }

    /**
     * Analyze if focus keyphrase appears in slug
     */
    private function analyzeFocusKeyphraseInSlug(array $articleData): array
    {
        $keyphrase = $articleData['focus_keyphrase'] ?? '';
        $seoSlug = $articleData['slug'] ?? '';
        $title = $articleData['title_en'] ?? '';

        if (empty($keyphrase)) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => 'لم يتم تحديد Focus Keyphrase بعد'
            ];
        }

        // Use SEO slug if provided, otherwise generate from title
        $slug = $seoSlug ?: $this->generateSlug($title);

        if (empty($slug)) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => 'لم يتم تحديد Slug'
            ];
        }

        $containsKeyphrase = $this->containsKeyphrase($slug, $keyphrase);

        return [
            'status' => $containsKeyphrase ? self::STATUS_PASS : self::STATUS_WARNING,
            'message' => $containsKeyphrase ? '✓ الكلمة المفتاحية موجودة في الـ Slug' : '⚠ يُفضل وجود الكلمة المفتاحية في الـ Slug'
        ];
    }

    /**
     * Analyze if focus keyphrase appears in meta description
     */
    private function analyzeFocusKeyphraseInMeta(array $articleData): array
    {
        $keyphrase = $articleData['focus_keyphrase'] ?? '';
        $meta = $articleData['meta_description'] ?? '';

        if (empty($keyphrase)) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => 'لم يتم تحديد Focus Keyphrase بعد'
            ];
        }

        if (empty($meta)) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => 'لم يتم كتابة Meta Description'
            ];
        }

        $containsKeyphrase = $this->containsKeyphrase($meta, $keyphrase);

        return [
            'status' => $containsKeyphrase ? self::STATUS_PASS : self::STATUS_WARNING,
            'message' => $containsKeyphrase ? '✓ الكلمة المفتاحية موجودة في Meta Description' : '⚠ يُفضل وجود الكلمة المفتاحية في Meta Description'
        ];
    }

    /**
     * Analyze if focus keyphrase appears in content
     */
    private function analyzeFocusKeyphraseInContent(array $articleData): array
    {
        $keyphrase = $articleData['focus_keyphrase'] ?? '';
        $content = $articleData['content_en'] ?? '';

        if (empty($keyphrase)) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => 'لم يتم تحديد Focus Keyphrase بعد'
            ];
        }

        if (empty($content)) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => 'لم يتم كتابة محتوى المقال'
            ];
        }

        $containsKeyphrase = $this->containsKeyphrase($content, $keyphrase);

        return [
            'status' => $containsKeyphrase ? self::STATUS_PASS : self::STATUS_FAIL,
            'message' => $containsKeyphrase ? '✓ الكلمة المفتاحية موجودة في محتوى المقال' : '✗ الكلمة المفتاحية غير موجودة في محتوى المقال'
        ];
    }

    /**
     * Analyze keyphrase density in content
     */
    private function analyzeKeyphraseDensity(array $articleData): array
    {
        $keyphrase = $articleData['focus_keyphrase'] ?? '';
        $content = $articleData['content_en'] ?? '';

        if (empty($keyphrase) || empty($content)) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => 'لم يتم تحديد Focus Keyphrase أو محتوى المقال'
            ];
        }

        $density = $this->calculateDensity($content, $keyphrase);

        if ($density < 0.5) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => "✗ كثافة الكلمة المفتاحية منخفضة جداً ({$density}%) - يُفضل 0.5-3%"
            ];
        } elseif ($density > 3) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => "⚠ كثافة الكلمة المفتاحية عالية ({$density}%) - تجنب التكرار المفرط"
            ];
        } else {
            return [
                'status' => self::STATUS_PASS,
                'message' => "✓ كثافة الكلمة المفتاحية مثالية ({$density}%)"
            ];
        }
    }

    /**
     * Analyze SEO title length
     */
    private function analyzeSeoTitleLength(array $articleData): array
    {
        $title = $articleData['seo_title'] ?? '';
        $length = mb_strlen($title);

        if ($length === 0) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => 'لم يتم كتابة SEO Title'
            ];
        }

        if ($length < 30) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => "✗ SEO Title قصير جداً ({$length} حرف) - الحد الأدنى 30 حرف"
            ];
        } elseif ($length > 60) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => "⚠ SEO Title طويل ({$length} حرف) - الحد الأقصى المثالي 60 حرف"
            ];
        } else {
            return [
                'status' => self::STATUS_PASS,
                'message' => "✓ طول SEO Title مثالي ({$length} حرف)"
            ];
        }
    }

    /**
     * Analyze meta description length
     */
    private function analyzeMetaDescriptionLength(array $articleData): array
    {
        $meta = $articleData['meta_description'] ?? '';
        $length = mb_strlen($meta);

        if ($length === 0) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => 'لم يتم كتابة Meta Description'
            ];
        }

        if ($length < 120) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => "✗ Meta Description قصير جداً ({$length} حرف) - الحد الأدنى 120 حرف"
            ];
        } elseif ($length > 160) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => "⚠ Meta Description طويل ({$length} حرف) - الحد الأقصى المثالي 160 حرف"
            ];
        } else {
            return [
                'status' => self::STATUS_PASS,
                'message' => "✓ طول Meta Description مثالي ({$length} حرف)"
            ];
        }
    }

    /**
     * Analyze featured image presence
     */
    private function analyzeFeaturedImage(array $articleData): array
    {
        $image = $articleData['image'] ?? null;

        if (!$image) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => '✗ لم يتم رفع صورة بارزة للمقال'
            ];
        }

        return [
            'status' => self::STATUS_PASS,
            'message' => '✓ تم رفع صورة بارزة للمقال'
        ];
    }

    /**
     * Analyze tags presence
     */
    private function analyzeTags(array $articleData): array
    {
        $tags = $articleData['tags'] ?? [];

        if (empty($tags) || count($tags) === 0) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => '⚠ لم يتم إضافة أي Tags - يُفضل إضافة 3-5 tags ذات صلة'
            ];
        }

        if (count($tags) < 3) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => '⚠ عدد الـ Tags قليل (' . count($tags) . ') - يُفضل إضافة المزيد'
            ];
        }

        return [
            'status' => self::STATUS_PASS,
            'message' => '✓ تم إضافة ' . count($tags) . ' Tags للمقال'
        ];
    }

    /**
     * Analyze category presence
     */
    private function analyzeCategory(array $articleData): array
    {
        $categoryId = $articleData['category_id'] ?? null;

        if (!$categoryId) {
            return [
                'status' => self::STATUS_FAIL,
                'message' => '✗ لم يتم تحديد فئة المقال'
            ];
        }

        return [
            'status' => self::STATUS_PASS,
            'message' => '✓ تم تحديد فئة المقال'
        ];
    }

    /**
     * Analyze if synonyms appear in content
     */
    private function analyzeSynonymsInContent(array $articleData): array
    {
        $synonyms = $articleData['synonyms_keyphrase'] ?? '';
        $content = $articleData['content_en'] ?? '';

        if (empty($synonyms)) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => '⚠ لم يتم تحديد مرادفات الكلمة المفتاحية'
            ];
        }

        if (empty($content)) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => 'لم يتم كتابة محتوى المقال'
            ];
        }

        $synonymsArray = array_map('trim', explode(',', $synonyms));
        $foundSynonyms = [];

        foreach ($synonymsArray as $synonym) {
            if (!empty($synonym) && $this->containsKeyphrase($content, $synonym)) {
                $foundSynonyms[] = $synonym;
            }
        }

        if (empty($foundSynonyms)) {
            return [
                'status' => self::STATUS_WARNING,
                'message' => '⚠ لم يتم العثور على أي من المرادفات في محتوى المقال'
            ];
        }

        return [
            'status' => self::STATUS_PASS,
            'message' => '✓ تم العثور على ' . count($foundSynonyms) . ' مرادف في المحتوى: ' . implode(', ', $foundSynonyms)
        ];
    }

    /**
     * Calculate overall SEO score
     */
    private function calculateOverallScore(array $results): array
    {
        $totalChecks = count($results);
        $passCount = 0;
        $warningCount = 0;
        $failCount = 0;

        foreach ($results as $result) {
            switch ($result['status']) {
                case self::STATUS_PASS:
                    $passCount++;
                    break;
                case self::STATUS_WARNING:
                    $warningCount++;
                    break;
                case self::STATUS_FAIL:
                    $failCount++;
                    break;
            }
        }

        $score = round((($passCount * 1) + ($warningCount * 0.5)) / $totalChecks * 100);

        $grade = 'F';
        if ($score >= 90) {
            $grade = 'A';
        } elseif ($score >= 80) {
            $grade = 'B';
        } elseif ($score >= 70) {
            $grade = 'C';
        } elseif ($score >= 60) {
            $grade = 'D';
        }

        return [
            'score' => $score,
            'grade' => $grade,
            'summary' => [
                'total' => $totalChecks,
                'pass' => $passCount,
                'warning' => $warningCount,
                'fail' => $failCount
            ]
        ];
    }

    /**
     * Check if text contains keyphrase
     */
    private function containsKeyphrase(string $text, string $keyphrase): bool
    {
        if (empty($text) || empty($keyphrase)) {
            return false;
        }

        // Normalize both text and keyphrase for better matching
        $text = $this->normalizeArabicText(mb_strtolower($text));
        $keyphrase = $this->normalizeArabicText(mb_strtolower(trim($keyphrase)));

        return mb_strpos($text, $keyphrase) !== false;
    }

    /**
     * Calculate keyphrase density
     */
    private function calculateDensity(string $content, string $keyphrase): float
    {
        $content = strip_tags($content);
        $content = mb_strtolower($content);
        $keyphrase = mb_strtolower(trim($keyphrase));

        if (empty($keyphrase) || empty($content)) {
            return 0;
        }

        // Count total words (better handling for both Arabic and English)
        $totalWords = $this->countWords($content);

        if ($totalWords === 0) {
            return 0;
        }

        // Count occurrences of the exact keyphrase
        $keyphraseCount = mb_substr_count($content, $keyphrase);

        // For multi-word keyphrases, also consider partial matches
        $keyphraseWords = explode(' ', $keyphrase);
        if (count($keyphraseWords) > 1) {
            // For multi-word keyphrases, we primarily count the exact phrase
            // But we can add some weight for individual words if they appear separately
            $individualCount = 0;
            foreach ($keyphraseWords as $word) {
                $individualCount += mb_substr_count($content, trim($word));
            }
            // Give 70% weight to exact phrase, 30% to individual words (avoiding double counting)
            $keyphraseCount = ($keyphraseCount * 0.7) + (max(0, $individualCount - $keyphraseCount) * 0.3);
        }

        return round(($keyphraseCount / $totalWords) * 100, 2);
    }

    /**
     * Count words in text (better handling for Arabic and English)
     */
    private function countWords(string $text): int
    {
        if (empty($text)) {
            return 0;
        }

        // Remove extra spaces and normalize
        $text = preg_replace('/\s+/', ' ', trim($text));

        // For Arabic text, split by spaces and count Arabic words
        if (preg_match('/\p{Arabic}/u', $text)) {
            $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
            return count($words);
        }

        // For English and other languages, use str_word_count
        return str_word_count($text, 0);
    }

    /**
     * Check if text contains Arabic characters
     */
    private function hasArabicText(string $text): bool
    {
        return preg_match('/\p{Arabic}/u', $text) > 0;
    }

    /**
     * Normalize Arabic text for better analysis
     */
    private function normalizeArabicText(string $text): string
    {
        if (!$this->hasArabicText($text)) {
            return $text;
        }

        // Remove tatweel (elongation character)
        $text = str_replace('ـ', '', $text);

        // Normalize different forms of alef
        $text = str_replace(['أ', 'إ', 'آ'], 'ا', $text);

        // Normalize hamza forms
        $text = str_replace(['ؤ', 'ئ'], 'ء', $text);

        return $text;
    }

    /**
     * Generate slug from title
     */
    private function generateSlug(string $title): string
    {
        return \Illuminate\Support\Str::slug($title);
    }
}
