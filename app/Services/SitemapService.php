<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SitemapService
{
    /**
     * Generate sitemap XML for articles
     */
    public function generateSitemap(): string
    {
        $articles = Article::where('status', 1)
            ->with(['media', 'category'])
            ->orderBy('updated_at', 'desc')
            ->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        $xml .= ' xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        // Add homepage
        $xml .= $this->generateUrlTag(url('/'), now(), 'daily', 1.0, []);

        // Add articles
        foreach ($articles as $article) {
            $alternates = [];
            
            // Arabic URL
            if ($article->slug_ar) {
                $arUrl = url('/articles/blog-details/' . $article->slug_ar);
                $alternates['ar'] = $arUrl;
                $xml .= $this->generateUrlTag($arUrl, $article->updated_at, 'weekly', 0.8, $alternates);
            }
            
            // English URL
            if ($article->slug_en) {
                $enUrl = url('/articles/blog-details/' . $article->slug_en);
                $alternates['en'] = $enUrl;
                $xml .= $this->generateUrlTag($enUrl, $article->updated_at, 'weekly', 0.8, $alternates);
            }
        }

        $xml .= '</urlset>';

        return $xml;
    }

    /**
     * Generate URL tag with hreflang alternates
     */
    private function generateUrlTag(string $url, $lastmod, string $changefreq, float $priority, array $alternates = []): string
    {
        $xml = "  <url>\n";
        $xml .= "    <loc>" . htmlspecialchars($url) . "</loc>\n";
        $xml .= "    <lastmod>" . $lastmod->format('Y-m-d') . "</lastmod>\n";
        $xml .= "    <changefreq>" . $changefreq . "</changefreq>\n";
        $xml .= "    <priority>" . $priority . "</priority>\n";
        
        // Add hreflang alternates
        foreach ($alternates as $lang => $altUrl) {
            $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"{$lang}\" href=\"" . htmlspecialchars($altUrl) . "\" />\n";
        }
        
        $xml .= "  </url>\n";
        
        return $xml;
    }

    /**
     * Save sitemap to public directory
     */
    public function saveSitemap(string $filename = 'sitemap.xml'): bool
    {
        $xml = $this->generateSitemap();
        $path = public_path($filename);
        
        return File::put($path, $xml) !== false;
    }

    /**
     * Generate robots.txt content
     */
    public function generateRobotsTxt(): string
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /api/\n";
        $content .= "Disallow: /storage/\n";
        $content .= "\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";
        
        return $content;
    }

    /**
     * Save robots.txt
     */
    public function saveRobotsTxt(): bool
    {
        $content = $this->generateRobotsTxt();
        $path = public_path('robots.txt');
        
        return File::put($path, $content) !== false;
    }
}


