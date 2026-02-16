<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Faq;
use App\Models\Policy;
use App\Models\Project;
use App\Models\ProjectChallengeSolution;
use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faqs = [
            [
                "title_ar"       => "ترميم السقف الكامل",
                "title_en"       =>"Resail",
                "description_ar" => "تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "description_en" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna slabore dolore magnam aliquam quaerat voluptatem",
                "type" => "resale",
                'media' => [
                    [
                        'name'            => 'portfolio-item-1',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => PropertyType::class,
                        'identifier'      => 'image',
                        'url'             => '/storage/propertyType/1.jpg'
                    ]
                ]

            ],
            [
                "title_ar" => "ترميم السقف الكامل",
                "title_en" =>"Primary",
                "description_ar" =>"تآزر العلاقات الضريبية للموارد عبر الأسواق المتخصصة. زراعة خدمة العملاء من خلال أفكار قوية. تبسيط المقاييس المتمحورة حول المستخدم قبل الهياكل الرأسية. ابتكار منتجات مصنعة ممكّنة بينما المنصات الموازية.",
                "description_en" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna slabore dolore magnam aliquam quaerat voluptatem",
                "type" => "primary",
                'media' => [
                    [
                        'name'            => 'portfolio-item-2',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => PropertyType::class,
                        'identifier'      => 'image',
                        'url'             => '/storage/propertyType/2.jpg'
                    ]
                ]
            ],

        ];

        foreach ($faqs as $faq) {
            $model = PropertyType::create([
                'title_ar'       => $faq['title_ar'],
                'title_en'       => $faq['title_en'],
                'description_ar' => $faq['description_ar'],
                'description_en' => $faq['description_en'],
                'type'           => $faq['type'],
            ]);
            if (isset($faq['media']) && is_array($faq['media'])) {
                foreach ($faq['media'] as $media) {
                    $model->media()->create($media);
                }
            }


        }


    }

}