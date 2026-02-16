<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Company;
use App\Models\Faq;
use App\Models\Policy;
use App\Models\Project;
use App\Models\ProjectChallengeSolution;
use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faqs = [
            [
                "title_ar"       => "شركة 1",
                "title_en"       =>"Company 1",
                "property_type_id"           => 2,
                'media' => [
                    [
                        'name'            => 'portfolio-item-1',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Company::class,
                        'identifier'      => 'image',
                        'url'             => '/storage/companies/1.jpg'
                    ]
                ]

            ],
            [
                "title_ar"       => "شركة 2",
                "title_en"       =>"Company 2",
                "property_type_id" => 2,
                'media' => [
                    [
                        'name'            => 'portfolio-item-2',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Company::class,
                        'identifier'      => 'image',
                        'url'             => '/storage/companies/2.jpg'
                    ]
                ]
            ],
            [
                "title_ar"       => "شركة 3",
                "title_en"       =>"Company 3",
                "property_type_id" => 2,
                'media' => [
                    [
                        'name'            => 'portfolio-item-2',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Company::class,
                        'identifier'      => 'image',
                        'url'             => '/storage/companies/3.jpg'
                    ]
                ]
            ],
            [
                "title_ar"       => "شركة 4",
                "title_en"       =>"Company 4",
                "property_type_id" => 2,
                'media' => [
                    [
                        'name'            => 'portfolio-item-2',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Company::class,
                        'identifier'      => 'image',
                        'url'             => '/storage/companies/4.jpg'
                    ]
                ]
            ],
            [
                "title_ar"       => "شركة 5",
                "title_en"       =>"Company 5",
                "property_type_id" => 2,
                'media' => [
                    [
                        'name'            => 'portfolio-item-2',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Company::class,
                        'identifier'      => 'image',
                        'url'             => '/storage/companies/5.jpg'
                    ]
                ]
            ],
            [
                "title_ar"       => "شركة 6",
                "title_en"       =>"Company 6",
                "property_type_id" => 2,
                'media' => [
                    [
                        'name'            => 'portfolio-item-2',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Company::class,
                        'identifier'      => 'image',
                        'url'             => '/storage/companies/6.jpg'
                    ]
                ]
            ],

        ];

        foreach ($faqs as $faq) {
            $model = Company::create([
                'title_ar'       => $faq['title_ar'],
                'title_en'       => $faq['title_en'],
                'property_type_id'           => $faq['property_type_id'],
            ]);
            if (isset($faq['media']) && is_array($faq['media'])) {
                foreach ($faq['media'] as $media) {
                    $model->media()->create($media);
                }
            }


        }


    }

}