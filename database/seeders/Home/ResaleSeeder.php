<?php

namespace Database\Seeders\Home;

use App\Models\Faq;
use App\Models\Property;
use App\Models\Service;
use App\Models\File;
use App\Models\ServiceFaq;
use Illuminate\Database\Seeder;

class ResaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
            $faqs = [
                [
                    'title_ar'       => "تطوير سكني",
                    'title_en'       => "C Block Room",
                    'slug_ar'       => "تطوير-سكني",
                    'slug_en'       => "C Block Room",
                    'description_en' => 'We provide innovative IT solutions tailored to your business needs, including system maintenance, software development, and technical support.',
                    'description_ar' => 'نقدم حلولاً مبتكرة في مجال تقنية المعلومات مصممة خصيصاً لتلبية احتياجات أعمالك، بما في ذلك صيانة الأنظمة، وتطوير البرمجيات، والدعم الفني.',
                    'bathroom'       => 2,
                    'bedroom'        => 3,
                    'living_room'    => 1,
                    'kitchen'        => 2,
                    'garden'         => 1,
                    'floor'          => 2,
                    'parking'        => 1,
                    'number_house'   => 25,
                    'area_id'        => 1,
                    'property_type_id' => 2,
                    'project_id'     => 1,
                    'files'          => [
                        [
                            'name'            => 'pr-1.jpg',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'photo',
                            'url'             => '/storage/properties/pr-1.jpg'
                        ]
                    ]
                ],
                [
                    'title_ar'       => "تطوير سكني",
                    'title_en'       => "C Block Room",
                    'slug_ar'       => "تطوير-سكني",
                    'slug_en'       => "C Block Room",
                    'description_en' => 'We provide innovative IT solutions tailored to your business needs, including system maintenance, software development, and technical support.',
                    'description_ar' => 'نقدم حلولاً مبتكرة في مجال تقنية المعلومات مصممة خصيصاً لتلبية احتياجات أعمالك، بما في ذلك صيانة الأنظمة، وتطوير البرمجيات، والدعم الفني.',
                    'bathroom'       => 2,
                    'bedroom'        => 3,
                    'living_room'    => 1,
                    'kitchen'        => 2,
                    'garden'         => 1,
                    'floor'          => 2,
                    'parking'        => 1,
                    'number_house'   => 25,
                    'area_id'        => 2,
                    'property_type_id' => 2,
                    'project_id'     => 2,
                    'files'          => [
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'photo',
                            'url'             => '/storage/properties/pr-2.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-1.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-2.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-3.jpg'
                        ],
                    ]
                ],
                [
                    'title_ar'       => "تطوير سكني",
                    'title_en'       => "C Block Room",
                    'slug_ar'       => "تطوير-سكني",
                    'slug_en'       => "C Block Room",
                    'description_en' => 'We provide innovative IT solutions tailored to your business needs, including system maintenance, software development, and technical support.',
                    'description_ar' => 'نقدم حلولاً مبتكرة في مجال تقنية المعلومات مصممة خصيصاً لتلبية احتياجات أعمالك، بما في ذلك صيانة الأنظمة، وتطوير البرمجيات، والدعم الفني.',
                    'bathroom'       => 2,
                    'bedroom'        => 3,
                    'living_room'    => 1,
                    'kitchen'        => 2,
                    'garden'         => 1,
                    'floor'          => 2,
                    'parking'        => 1,
                    'number_house'   => 25,
                    'area_id'        => 3,
                    'property_type_id' => 2,
                    'project_id'     => 3,
                    'files'          => [
                        [
                            'name'            => '3.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'photo',
                            'url'             => '/storage/properties/pr-3.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-4.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-5.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-6.jpg'
                        ],

                    ]
                ],
                [
                    'title_ar'       => "تطوير سكني",
                    'title_en'       => "C Block Room",
                    'slug_ar'       => "تطوير-سكني",
                    'slug_en'       => "C Block Room",
                    'description_en' => 'We provide innovative IT solutions tailored to your business needs, including system maintenance, software development, and technical support.',
                    'description_ar' => 'نقدم حلولاً مبتكرة في مجال تقنية المعلومات مصممة خصيصاً لتلبية احتياجات أعمالك، بما في ذلك صيانة الأنظمة، وتطوير البرمجيات، والدعم الفني.',
                    'bathroom'       => 2,
                    'bedroom'        => 3,
                    'living_room'    => 1,
                    'kitchen'        => 2,
                    'garden'         => 1,
                    'floor'          => 2,
                    'parking'        => 1,
                    'number_house'   => 25,
                    'area_id'        => 4,
                    'property_type_id' => 2,
                    'project_id'     => 4,
                    'files'          => [
                        [
                            'name'            => '4.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'photo',
                            'url'             => '/storage/properties/pr-4.jpg'
                        ]
                    ],
                    [
                        'name'            => '2.png',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Property::class,
                        'identifier'      => 'images',
                        'url'             => '/storage/properties/house-7.jpg'
                    ],
                    [
                        'name'            => '2.png',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Property::class,
                        'identifier'      => 'images',
                        'url'             => '/storage/properties/house-8.jpg'
                    ],
                    [
                        'name'            => '2.png',
                        'mime_type'       => 'image/jpg',
                        'uploaded_by'     => 1,
                        'size'	          => 123,
                        'uploadable_type' => Property::class,
                        'identifier'      => 'images',
                        'url'             => '/storage/properties/house-9.jpg'
                    ],

                ],
                [

                    'title_ar'       => "تطوير سكني",
                    'title_en'       => "C Block Room",
                    'slug_ar'       => "تطوير-سكني",
                    'slug_en'       => "C Block Room",
                    'description_en' => 'We provide innovative IT solutions tailored to your business needs, including system maintenance, software development, and technical support.',
                    'description_ar' => 'نقدم حلولاً مبتكرة في مجال تقنية المعلومات مصممة خصيصاً لتلبية احتياجات أعمالك، بما في ذلك صيانة الأنظمة، وتطوير البرمجيات، والدعم الفني.',
                    'bathroom'       => 2,
                    'bedroom'        => 3,
                    'living_room'    => 1,
                    'kitchen'        => 2,
                    'garden'         => 1,
                    'floor'          => 2,
                    'parking'        => 1,
                    'number_house'   => 25,
                    'area_id'        => 4,
                    'property_type_id' => 1,
                    'files'          => [
                        [
                            'name'            => '5.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'photo',
                            'url'             => '/storage/properties/pr-5.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-10.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-11.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-12.jpg'
                        ],
                    ]
                ],
                [
                    'title_ar'       => "تطوير سكني",
                    'title_en'       => "C Block Room",
                    'slug_ar'       => "تطوير-سكني",
                    'slug_en'       => "C Block Room",
                    'description_en' => 'We provide innovative IT solutions tailored to your business needs, including system maintenance, software development, and technical support.',
                    'description_ar' => 'نقدم حلولاً مبتكرة في مجال تقنية المعلومات مصممة خصيصاً لتلبية احتياجات أعمالك، بما في ذلك صيانة الأنظمة، وتطوير البرمجيات، والدعم الفني.',
                    'bathroom'       => 2,
                    'bedroom'        => 3,
                    'living_room'    => 1,
                    'kitchen'        => 2,
                    'garden'         => 1,
                    'floor'          => 2,
                    'parking'        => 1,
                    'number_house'   => 25,
                    'area_id'        => 3,
                    'property_type_id' => 1,
                    'files'          => [
                        [
                            'name'            => '6.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'photo',
                            'url'             => '/storage/properties/pr-6.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-13.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-14.jpg'
                        ],
                        [
                            'name'            => '2.png',
                            'mime_type'       => 'image/jpg',
                            'uploaded_by'     => 1,
                            'size'	          => 123,
                            'uploadable_type' => Property::class,
                            'identifier'      => 'images',
                            'url'             => '/storage/properties/house-15.jpg'
                        ],
                    ]
                ]
            ];



            foreach ($faqs as $faq) {
                $model = Property::create([
                    'status'         => true,
                    'title_en'       => $faq['title_en'],
                    'title_ar'       => $faq['title_ar'],
                    'description_en' => $faq['description_en'],
                    'description_ar' => $faq['description_ar'],
                    'slug_en'       => $faq['slug_en'],
                    'slug_ar'       => $faq['slug_ar'],
                    'bathroom'       => $faq['bathroom'],
                    'bedroom'       => $faq['bedroom'],
                    'living_room'       => $faq['living_room'],
                    'kitchen'       => $faq['kitchen'],
                    'garden'              => $faq['garden'],
                    'floor'              => $faq['floor'],
                    'parking'            => $faq['parking'],
                    'number_house'       => $faq['number_house'],
                    'area_id'            => $faq['area_id'],
                    'property_type_id'   => $faq['property_type_id'],
                    'project_id'   => $faq['project_id']??null,
                ]);
                if (isset($faq['files']) && is_array($faq['files'])) {
                    foreach ($faq['files'] as $file) {
                        File::create([
                            'name'            => $file['name'],
                            'mime_type'       => $file['mime_type'],
                            'uploaded_by'     => $file['uploaded_by'],
                            'size'	          => $file['size'],
                            'uploadable_type' => $file['uploadable_type'],
                            'uploadable_id'   => $model->id,
                            'identifier'      => $file['identifier'],
                            'url'             => $file['url']
                        ]);
                    }
                }


            }

    }
}