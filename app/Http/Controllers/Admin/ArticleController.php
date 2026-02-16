<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Resources\Admin\ArticleCategoryResource;
use App\Http\Resources\Admin\ArticleQuiriesResource;
use App\Http\Resources\Admin\ArticleResource;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleClientQuiry;
use App\Services\SeoAnalyzerService;
use App\Services\SeoService;
use App\Services\SitemapService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function indexPageQueries(Request $request): View
    {
        return view('admin.articles.index-queries');
    }

    public function articlesQueries()
    {
        $data = ArticleClientQuiry::paginate(10);
        return responseJson(ArticleQuiriesResource::collection($data->items()), '', 200, getPaginates($data));
    }

    public function indexPage(Request $request): View
    {
        return view('admin.articles.index');
    }

    public function index(Request $request)
    {
        $data = Article::with('media')->paginate(10);
        return responseJson(ArticleResource::collection($data->items()), '', 200, getPaginates($data));
    }

    public function store(ArticleRequest $request)
    {

        $validated = $request->validated();

        // Pre-publish checklist
        $seoService = new SeoService();
        $checklist = $seoService->prePublishChecklist(
            (new Article())->fill($validated),
            $request->input('publish_locale', 'ar')
        );

        if (!$checklist['all_passed'] && $request->input('strict_mode', false)) {
            return responseJson([
                'checklist' => $checklist,
                'message' => 'Pre-publish checklist failed. Please fix the issues before publishing.'
            ], 'Validation failed', 422);
        }

        // Generate slugs if not provided

        if (empty($validated['slug_ar']) && !empty($validated['title_ar'])) {
            $validated['slug_ar'] = $seoService->generateSlug($validated['title_ar'], 'ar');
            // Ensure uniqueness
            $baseSlug = $validated['slug_ar'];
            $counter = 1;
            while (!$seoService->isSlugUnique($validated['slug_ar'], 'ar')) {
                $validated['slug_ar'] = $baseSlug . '-' . $counter;
                $counter++;
            }
        }

        if (empty($validated['slug_en']) && !empty($validated['title_en'])) {
            $validated['slug_en'] = $seoService->generateSlug($validated['title_en'], 'en');
            // Ensure uniqueness
            $baseSlug = $validated['slug_en'];
            $counter = 1;
            while (!$seoService->isSlugUnique($validated['slug_en'], 'en')) {
                $validated['slug_en'] = $baseSlug . '-' . $counter;
                $counter++;
            }
        }

        // Generate canonical URLs if not provided
        if (empty($validated['canonical_url_ar']) && !empty($validated['slug_ar'])) {
            $validated['canonical_url_ar'] = $seoService->generateCanonicalUrl(
                (new Article())->fill(['slug_ar' => $validated['slug_ar']]),
                'ar'
            );
        }

        if (empty($validated['canonical_url_en']) && !empty($validated['slug_en'])) {
            $validated['canonical_url_en'] = $seoService->generateCanonicalUrl(
                (new Article())->fill(['slug_en' => $validated['slug_en']]),
                'en'
            );
        }

        // Extract image metadata
        if ($request->hasFile('image')) {
            $imageMetadata = $seoService->extractImageMetadata($request->file('image'));
            $validated['image_width'] = $imageMetadata['width'];
            $validated['image_height'] = $imageMetadata['height'];
            $validated['image_mime'] = $imageMetadata['mime'];
        }

        $data = Article::create($validated);
        saveFiles($request->image, $data, "articles");

        // Regenerate sitemap
        try {
            $sitemapService = new SitemapService();
            $sitemapService->saveSitemap();
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to generate sitemap: ' . $e->getMessage());
        }

        return responseJson([
            'checklist' => $checklist
        ], 'Created Successfully', 200);
    }

    public function show($id)
    {
        $data = Article::with(['media'])->find($id);
        return responseJson($data, 'Data exited successfully', 200);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $validated = $request->validated();
        $seoService = new SeoService();

        // Track old slugs for redirects
        $oldSlugAr = $article->slug_ar;
        $oldSlugEn = $article->slug_en;

        // Generate slugs if not provided
        if (empty($validated['slug_ar']) && !empty($validated['title_ar'])) {
            $validated['slug_ar'] = $seoService->generateSlug($validated['title_ar'], 'ar');
            // Ensure uniqueness
            $baseSlug = $validated['slug_ar'];
            $counter = 1;
            while (!$seoService->isSlugUnique($validated['slug_ar'], 'ar', $article->id)) {
                $validated['slug_ar'] = $baseSlug . '-' . $counter;
                $counter++;
            }
        }

        if (empty($validated['slug_en']) && !empty($validated['title_en'])) {
            $validated['slug_en'] = $seoService->generateSlug($validated['title_en'], 'en');
            // Ensure uniqueness
            $baseSlug = $validated['slug_en'];
            $counter = 1;
            while (!$seoService->isSlugUnique($validated['slug_en'], 'en', $article->id)) {
                $validated['slug_en'] = $baseSlug . '-' . $counter;
                $counter++;
            }
        }

        // Generate canonical URLs if not provided
        if (empty($validated['canonical_url_ar']) && !empty($validated['slug_ar'])) {
            $validated['canonical_url_ar'] = $seoService->generateCanonicalUrl(
                (new Article())->fill(['slug_ar' => $validated['slug_ar']]),
                'ar'
            );
        }

        if (empty($validated['canonical_url_en']) && !empty($validated['slug_en'])) {
            $validated['canonical_url_en'] = $seoService->generateCanonicalUrl(
                (new Article())->fill(['slug_en' => $validated['slug_en']]),
                'en'
            );
        }

        // Extract image metadata if new image uploaded
        if ($request->hasFile('image')) {
            $imageMetadata = $seoService->extractImageMetadata($request->file('image'));
            $validated['image_width'] = $imageMetadata['width'];
            $validated['image_height'] = $imageMetadata['height'];
            $validated['image_mime'] = $imageMetadata['mime'];
            saveFiles($request->image, $article, "articles", null, 'update');
        }

        $article->update($validated);

        // Create redirects if slugs changed
        if (isset($validated['slug_ar']) && $oldSlugAr !== $validated['slug_ar']) {
            $seoService->createRedirect($article, $oldSlugAr, $validated['slug_ar'], 'ar');
        }

        if (isset($validated['slug_en']) && $oldSlugEn !== $validated['slug_en']) {
            $seoService->createRedirect($article, $oldSlugEn, $validated['slug_en'], 'en');
        }

        return responseJson([], 'Updated Successfully', 200);
    }

    public function destroy(Article $article)
    {
        deleteFile($article);
        $article->delete();
        return responseJson([], 'Deleted Successfully', 200);
    }

    public function getCategories()
    {
        return responseJson(ArticleCategoryResource::collection(ArticleCategory::latest()->get()));
    }

    public function analyzeSeo(Request $request)
    {
        $validator = validator($request->all(), [
            'title_ar' => 'nullable|string',
            'title_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'content_en' => 'nullable|string',
            'seo_title' => 'nullable|string',
            'seo_title_ar' => 'nullable|string',
            'seo_title_en' => 'nullable|string',
            'slug' => 'nullable|string',
            'slug_ar' => 'nullable|string',
            'slug_en' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_description_ar' => 'nullable|string',
            'meta_description_en' => 'nullable|string',
            'focus_keyphrase' => 'nullable|string',
            'focus_keyphrase_ar' => 'nullable|string',
            'focus_keyphrase_en' => 'nullable|string',
            'synonyms_keyphrase' => 'nullable|string',
            'synonyms_keyphrase_ar' => 'nullable|string',
            'synonyms_keyphrase_en' => 'nullable|string',
            'category_id' => 'nullable|integer',
            'tags' => 'nullable|array',
            'tags_ar' => 'nullable|array',
            'tags_en' => 'nullable|array',
            'image' => 'nullable|string',
            'locale' => 'nullable|string|in:ar,en'
        ]);

        if ($validator->fails()) {
            return responseJson([], 'Validation failed', 422, [], $validator->errors());
        }

        $locale = $request->input('locale', 'ar');
        $seoAnalyzer = new SeoAnalyzerService();
        $analysis = $seoAnalyzer->analyze($request->all(), $locale);

        return responseJson($analysis, 'SEO analysis completed', 200);
    }

    public function prePublishChecklist(Request $request)
    {
        $validator = validator($request->all(), [
            'title_ar' => 'nullable|string',
            'title_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'content_en' => 'nullable|string',
            'seo_title_ar' => 'nullable|string',
            'seo_title_en' => 'nullable|string',
            'slug_ar' => 'nullable|string',
            'slug_en' => 'nullable|string',
            'meta_description_ar' => 'nullable|string',
            'meta_description_en' => 'nullable|string',
            'focus_keyphrase_ar' => 'nullable|string',
            'focus_keyphrase_en' => 'nullable|string',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|string',
            'locale' => 'nullable|string|in:ar,en'
        ]);

        if ($validator->fails()) {
            return responseJson([], 'Validation failed', 422, [], $validator->errors());
        }

        $locale = $request->input('locale', 'ar');
        $seoService = new SeoService();

        $article = new Article();
        $article->fill($request->all());

        $checklist = $seoService->prePublishChecklist($article, $locale);

        return responseJson($checklist, 'Pre-publish checklist completed', 200);
    }
}
