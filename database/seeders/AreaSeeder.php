<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Faq;
use App\Models\Partner;
use App\Models\Team;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::truncate();

        $teams = [
            [
                "title_ar" => "القاهرة الجديدة",
                "title_en" => "New Cairo",
            ],
            [
                "title_ar" => "التجمع الخامس",
                "title_en" => "Fifth Settlement",
            ],
            [
                "title_ar" => "مصر الجديدة",
                "title_en" => "Heliopolis",
            ],
            [
                "title_ar" => "المعادي",
                "title_en" => "Maadi",
            ],
            [
                "title_ar" => "مدينة نصر",
                "title_en" => "Nasr City",
            ],
            [
                "title_ar" => "الزمالك",
                "title_en" => "Zamalek",
            ],
            [
                "title_ar" => "المهندسين",
                "title_en" => "Mohandessin",
            ],
            [
                "title_ar" => "الدقي",
                "title_en" => "Dokki",
            ],
            [
                "title_ar" => "المقطم",
                "title_en" => "Mokattam",
            ],
            [
                "title_ar" => "جاردن سيتي",
                "title_en" => "Garden City",
            ],

        ];

        foreach ($teams as $team) {
            $model = Area::create([
                'title_ar' => $team['title_ar'],
                'title_en' => $team['title_en'],
                'status'   => 1,

            ]);

        }

    }
}