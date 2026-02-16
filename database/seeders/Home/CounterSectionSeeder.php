<?php

namespace Database\Seeders\Home;

use App\Models\CounterSection;
use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CounterSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $counters = [
                [
                    'count' => '3658',
                    'title_ar' => "التطبيقات <br> التي تم تطويرها",
                    'title_en' => "Apps <br> Developed",
                    'url' => '/website/images/counter/document.png',
                ],
                [
                    'count' => '2019',
                    'title_ar' => "تطوير <br> الويب",
                    'title_en' => "Web <br> Developed",
                    'url' => '/website/images/counter/rate3.png',
                ],
                [
                    'count' => '2600',
                    'title_ar' => "عملاء <br> سعداء",
                    'title_en' => "Happy <br> Clients",
                    'url' => '/website/images/counter/rate3.png',
                ],
                [
                    'count' => '1200',
                    'title_ar' => "علم <br> البيانات ",
                    'title_en' => "Data <br> Science",
                    'url' => '/website/images/counter/db-server-2.png',
                ],
                [
                    'count' => '1750',
                    'title_ar' => "تقييمات <br> العملاء ",
                    'title_en' => "Customer <br> Ratings",
                    'url' => '/website/images/counter/rate3.png',
                ],
                [
                    'count' => '4560',
                    'title_ar' => "المشاريع <br> التي تم تسليمها",
                    'title_en' => "Projects <br> Delivered",
                    'url' => '/website/images/counter/document.png',
                ],
            ];

            foreach ($counters as $counter) {
                $model = CounterSection::create([
                    'count' => $counter['count'],
                    'title_ar' => $counter['title_ar'],
                    'title_en' => $counter['title_en'],
                ]);
                $model->media()->create([
                    'name' =>  $counter['title_en'],
                    'size' => 444,
                    'mime_type' => 'sdd',
                    'identifier' => null,
                    'uploaded_by' =>  1,
                    'url' => $counter['url'],
                ]);
            }
    }
}