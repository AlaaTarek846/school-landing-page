<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $articleId = $this->method() == 'PUT' && isset($this->article) ? $this->article->id : null;

        return [
            // Basic fields
            "title_ar" => "required|string|max:200",
            "title_en" => "required|string|max:200",
            "content_ar" => "required|string",
            "content_en" => "required|string",
            "status" => "required|boolean",
            "category_id" => "required|exists:article_categories,id",
            'image' => [$this->method() == "PUT" ? 'nullable' : 'required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],

            // Legacy SEO fields (for backward compatibility)
            "focus_keyphrase" => "nullable|string|max:255",
            "seo_title" => "nullable|string|max:255",
            "slug" => "nullable|string|max:255",
            "meta_description" => "nullable|string|max:500",
            "tags" => "nullable|array",
            "tags.*" => "string|max:100",
            "synonyms_keyphrase" => "nullable|string|max:255",

            // Bilingual SEO fields - Arabic
            "focus_keyphrase_ar" => "nullable|string|max:255",
            "seo_title_ar" => "nullable|string|max:255",
            "slug_ar" => [
                "nullable",
                "string",
                "max:255",
                "regex:/^[a-z0-9\-_\p{Arabic}]+$/iu",
                function ($attribute, $value, $fail) use ($articleId) {
                    if ($value && !$this->isSlugUnique($value, 'ar', $articleId)) {
                        $fail('The Arabic slug has already been taken.');
                    }
                },
            ],
            "meta_description_ar" => "nullable|string|max:500",
            "tags_ar" => "nullable|array",
            "tags_ar.*" => "string|max:100",
            "synonyms_keyphrase_ar" => "nullable|string|max:255",
            "canonical_url_ar" => "nullable|url|max:500",

            // Bilingual SEO fields - English
            "focus_keyphrase_en" => "nullable|string|max:255",
            "seo_title_en" => "nullable|string|max:255",
            "slug_en" => [
                "nullable",
                "string",
                "max:255",
                "regex:/^[a-z0-9\-_]+$/i",
                function ($attribute, $value, $fail) use ($articleId) {
                    if ($value && !$this->isSlugUnique($value, 'en', $articleId)) {
                        $fail('The English slug has already been taken.');
                    }
                },
            ],
            "meta_description_en" => "nullable|string|max:500",
            "tags_en" => "nullable|array",
            "tags_en.*" => "string|max:100",
            "synonyms_keyphrase_en" => "nullable|string|max:255",
            "canonical_url_en" => "nullable|url|max:500",
        ];
    }

    /**
     * Check if slug is unique for a specific locale
     */
    private function isSlugUnique(string $slug, string $locale, ?int $excludeId = null): bool
    {
        $column = $locale === 'ar' ? 'slug_ar' : 'slug_en';
        $query = \App\Models\Article::where($column, $slug);

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return !$query->exists();
    }
}
