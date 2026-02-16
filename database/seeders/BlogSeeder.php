<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Faq;
use App\Models\Project;
use App\Models\ProjectChallengeSolution;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ProjectCategorises = [
            [
                'title_ar' => 'الديكور الداخلي',
                'title_en' => 'Interior',
            ],
            [
                'title_ar' => 'المنزل',
                'title_en' => 'Home',
            ],
            [
                'title_ar' => 'المطبخ',
                'title_en' => 'kitchen',
            ],
            [
                'title_ar' => 'غرفة الجلوس',
                'title_en' => 'Sitting Room',
            ],
            [
                'title_ar' => 'غرفة النوم',
                'title_en' => ' Bedroom',
            ],
            [
                'title_ar' => 'شقة',
                'title_en' => ' Apartment',
            ],
        ];


        $faqs = [
            [
                "title_ar" => "العقارات جاءت لتلبي التوقعات",
                "title_en" =>"Real Estate Is Being Came In The Place Of Expectations",
                "slug_ar" =>"العقارات-جاءت-لتلبي-التوقعات",
                "slug_en" =>"Real Estate Is Being Came In The Place Of Expectations",
                "content_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "content_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "category_id" =>1,
                'media' => [
                    [
                        'name'            => 'Real',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Project::class,
                        'url'             => '/storage/articles/1.jpg'
                    ]
                ]

            ],
            [
                "title_ar" => "العقارات قد تكون الخيار الأول؟",
                "title_en" =>"Luxury Property Is Might Be First Choose?",
                "slug_ar" => "العقارات-قد-تكون-الخيار-الأول",
                "slug_en" =>"Luxury Property Is Might Be First Choose?",
                "content_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "content_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "category_id" =>2,
                'media' => [
                [
                    'name'            => 'Luxury',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                    'url'             => '/storage/articles/2.jpg'
                    ]
                ]
            ],
            [
                "title_ar" => "كيف سيكون في قائمتي إذا لم أعرف",
                "title_en" =>"How It Would Be In My List If I Don’t Know!",
                "slug_ar" =>"كيف-سيكون-في-قائمتي-إذا-لم-أعرف",
                "slug_en" =>"How It Would Be In My List If I Don’t Know!",
                "content_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "content_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "category_id" =>3,
                'media' => [
                [
                    'name'            => 'How',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                    'url'             => '/storage/articles/3.jpg'
                    ]
                ]
            ],
            [
                "title_ar" =>"أفكار تصميم غرفة المعيشة الفاخرة الحديثة",
                "title_en" =>"Modern Luxury Living Room Design Ideas",
                "slug_ar" => "افكار-تصميم-غرفة-المعيشة-الفاخرة-الحديثة",
                "slug_en" =>"Modern Luxury Living Room Design Ideas",
                "content_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "content_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "category_id" =>4,
                'media' => [
                [
                    'name'            => 'Modern',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                    'url'             => '/storage/articles/4.jpg'
                    ]
                ]
            ],
            [
                "title_ar" =>"تصميم غرفة نوم فاخرة حديثة في هنا.",
                "title_en" =>"Modern Luxury Bedroom Interior Design in Here.",
                "slug_ar" =>"تصميم-غرفة-نوم-فاخرة-حديثة-في-هنا",
                "slug_en" =>"Modern Luxury Bedroom Interior Design in Here.",
                "content_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "content_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "category_id" =>5,
                'media' => [
                [
                    'name'            => 'Modern',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                    'url'             => '/storage/articles/5.jpg'
                    ]
                ]
            ],
            [
                "title_ar" =>"العقارات قد تكون الخيار الأول؟",
                "title_en" =>"Luxury Property Is Might Be First Choose?",
                "slug_ar" =>"العقارات-قد-تكون-الخيار-الأول",
                "slug_en" =>"Luxury Property Is Might Be First Choose?",
                "content_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "content_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "category_id" =>6,
                'media' => [
                    [
                    'name'            => 'Luxury',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                        'url'             => '/storage/articles/6.jpg'
                    ]
                ]
            ],
        ];
        foreach ($ProjectCategorises as $categorises) {
            $model = ArticleCategory::create([
                'title_ar' => $categorises['title_ar'],
                'title_en' => $categorises['title_en'],

            ]);


        }


        foreach ($faqs as $faq) {
            $model = Article::create([
                'title_ar' => $faq['title_ar'],
                'title_en' => $faq['title_en'],
                'slug_ar' => $faq['slug_ar'],
                'slug_en' => $faq['slug_en'],
                'content_ar' => $faq['content_ar'],
                'content_en' => $faq['content_en'],
                'category_id' => $faq['category_id'],
            ]);
            if (isset($faq['media']) && is_array($faq['media'])) {
                foreach ($faq['media'] as $media) {
                    $model->media()->create($media);
                }
            }


        }
    }

}