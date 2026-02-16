<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Project;
use App\Models\ProjectChallengeSolution;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section = Project::first();

        $faqs = [
            [
                "title_ar" => "ترميم السقف الكامل",
                "title_en" =>"project 1",
                "slug_ar" =>"ترميم-السقف-الكامل",
                "slug_en" =>"total-roof-restoration",
                "description_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "description_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "year" => "2022",
                "company_id" => 1,
                'media' => [
                    [
                        'name'            => 'portfolio-item-1',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Project::class,
                        'identifier'      => 'image',
                        'url'             => '/storage/project/1.jpg'
                    ]
                ]

            ],
            [
                "title_ar" => "ترميم السقف الكامل",
                "title_en" =>"project 2",
                "slug_ar" =>"ترميم-السقف-الكامل",
                "slug_en" =>"total-roof-restoration",
                "description_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "description_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "year" => "2023",
                "company_id" => 2,
                'media' => [
                [
                    'name'            => 'portfolio-item-2',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                    'identifier'      => 'image',
                    'url'             => '/storage/project/2.jpg'
                    ]
                ]
            ],
            [
                 "title_ar" => "ترميم السقف الكامل",
                "title_en" =>"project 3",
                "slug_ar" =>"ترميم-السقف-الكامل",
                "slug_en" =>"total-roof-restoration",
                "description_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "description_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "year" => "2024",
                "company_id" => 3,
                'media' => [
                [
                    'name'            => 'portfolio-item-3',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                    'identifier'      => 'image',
                    'url'             => '/storage/project/3.jpg'
                    ]
                ]
            ],
            [
                "title_ar" => "ترميم السقف الكامل",
                "title_en" =>"project 4",
                "slug_ar" =>"ترميم-السقف-الكامل",
                "slug_en" =>"total-roof-restoration",
                "description_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "description_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "year" => "2025",
                "company_id" => 4,
                'media' => [
                [
                    'name'            => 'portfolio-item-4',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                    'identifier'      => 'image',
                    'url'             => '/storage/project/4.jpg'
                    ]
                ]
            ],
            [
                "title_ar" => "ترميم السقف الكامل",
                "title_en" =>"Project 5",
                "slug_ar" =>"ترميم-السقف-الكامل",
                "slug_en" =>"total-roof-restoration",
                "description_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "description_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "year" => "2022",
                "company_id" => 5,
                'media' => [
                [
                    'name'            => 'portfolio-item-5',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                    'identifier'      => 'image',
                    'url'             => '/storage/project/5.jpg'
                    ]
                ]
            ],
            [
                "title_ar" => "ترميم السقف الكامل",
                "title_en" =>"Project 6",
                "slug_ar" =>"ترميم-السقف-الكامل",
                "slug_en" =>"total-roof-restoration",
                "description_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "description_en" =>"Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically
                streamline user-centric metrics before vertical architectures. Objectively innovate empowered manufactured products whereas parallel platforms.",
                "year" => "2023",
                "company_id" => 6,
                'media' => [
                    [
                    'name'            => 'portfolio-item-5',
                    'mime_type'       => 'image/jpg',
                    'uploaded_by'     => 1,
                    'size'	          => 123,
                    'uploadable_type' => Project::class,
                    'identifier'      => 'image',
                    'url'             => '/storage/project/6.jpg'
                    ]
                ]
            ],
        ];

        foreach ($faqs as $faq) {
            $model = Project::create([
                'title_ar' => $faq['title_ar'],
                'title_en' => $faq['title_en'],
                'slug_ar' => $faq['slug_ar'],
                'slug_en' => $faq['slug_en'],
                'description_ar' => $faq['description_ar'],
                'description_en' => $faq['description_en'],
                'company_id' => $faq['company_id'],
                "year" => $faq['year'],
            ]);
            if (isset($faq['media']) && is_array($faq['media'])) {
                foreach ($faq['media'] as $media) {
                    $model->media()->create($media);
                }
            }


        }
    }

}