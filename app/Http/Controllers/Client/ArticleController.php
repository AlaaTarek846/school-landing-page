<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleClientQuiry;
use App\Models\ArticleRedirect;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $setting = Setting::first();
        $articles = Article::with(['media', 'category'])
            ->withCount('comments')->where(function ($q) {
                if (request()->search) {
                    $q->where(function ($q) {
                        $q->orWhere("title_ar", "like", "%" . request()->search . "%")
                            ->orWhere("title_en", "like", "%" . request()->search . "%")
                            ->orWhere("content_ar", "like", "%" . request()->search . "%")
                            ->orWhere("content_en", "like", "%" . request()->search . "%");
                    });
                }
                if (request()->category_id) {
                    $q->where('category_id', request()->category_id);
                }
            })->whereStatus(1)->paginate(8);
        $categories = ArticleCategory::withCount('articles')->get();
        return view('website.articles', compact('articles', 'setting', 'categories'));
    }

    public function blogDetails($slug)
    {
        try {
            // Decode URL-encoded slug
            $slug = urldecode($slug);

            // Trim and validate slug
            $slug = trim($slug);
            if (empty($slug)) {
                abort(404, 'Article not found');
            }

            // Check if slug is numeric (ID fallback)
            $isNumeric = is_numeric($slug);

            // Check for redirects first (only if not numeric)
            if (!$isNumeric) {
                $locale = app()->getLocale();
                $redirect = ArticleRedirect::where(function($q) use ($slug, $locale) {
                    if ($locale === 'ar') {
                        $q->where('old_slug_ar', $slug);
                    } else {
                        $q->where('old_slug_en', $slug);
                    }
                })->where('locale', $locale)->first();

                if ($redirect) {
                    // Increment hits
                    $redirect->increment('hits');

                    // Get new slug
                    $newSlug = $locale === 'ar' ? $redirect->new_slug_ar : $redirect->new_slug_en;

                    if ($newSlug) {
                        return redirect()->route('blog-details', ['slug' => $newSlug], $redirect->redirect_type);
                    }
                }
            }

            // Find article by slug or ID
            $article = null;

            if ($isNumeric) {
                // If numeric, search by ID
                $article = Article::withCount('comments')
                    ->with(['comments', 'media', 'category'])
                    ->where('status', 1)
                    ->where('id', $slug)
                    ->first();
            } else {
                // Search by slug
                $article = Article::withCount('comments')
                    ->with(['comments', 'media', 'category'])
                    ->where('status', 1)
                    ->where(function($q) use ($slug) {
                        $q->where('slug_ar', $slug)
                            ->orWhere('slug_en', $slug)
                            ->orWhere('slug', $slug); // Legacy slug support
                    })
                    ->first();
            }

            // If article not found, abort with 404
            if (!$article) {
                \Log::warning('Article not found', [
                    'slug' => $slug,
                    'is_numeric' => $isNumeric,
                    'locale' => app()->getLocale()
                ]);
                abort(404, 'Article not found');
            }

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Article not found');
        } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            throw $e; // Re-throw 404 exceptions
        } catch (\Exception $e) {
            \Log::error('Error in blogDetails: ' . $e->getMessage(), [
                'slug' => $slug ?? 'N/A',
                'trace' => $e->getTraceAsString()
            ]);
            abort(404, 'Article not found');
        }

        $setting = Setting::first();
        $categories = ArticleCategory::withCount('articles')->get();
        // المشروع السابق (أقل من ID الحالي)
        $previousProject = Article::where('status', 1)
            ->where('id', '<', $article->id)
            ->orderBy('id', 'desc')
            ->first();

        // المشروع التالي (أكبر من ID الحالي)
        $nextProject = Article::where('status', 1)
            ->where('id', '>', $article->id)
            ->orderBy('id', 'asc')
            ->first();
        return view('website.article-details', compact('article', 'setting', 'categories','previousProject','nextProject'));
    }
    public function portfolioIndex()
    {
        return view('website.portfolio');
    }
    public function portfolioDetails($slug)
    {
        return view('website.portfolio-details');
    }

    public function submitQuery(){
        $data = request()->validate([
            "name" => "required|max:255",
            "email" => "required|email|max:255",
            "article_id" => "required|exists:articles,id",
            "comment" => "required|max:500"
        ]);
        ArticleClientQuiry::create($data);
        return redirect()->back();

    }
}
