<?php

namespace Database\Seeders;

use App\Models\CampusTour;
use Illuminate\Database\Seeder;

class CampusTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CampusTour::truncate();

        $tours = [
            [
                'title_ar' => 'جولة في المعامل',
                'title_en' => 'Lab Tour',
                'image' => 'campus_tours/img-01.png',
                'video' => null,
                'link' => null,
            ],
            [
                'title_ar' => 'المكتبة المدرسية',
                'title_en' => 'School Library',
                'image' => 'campus_tours/img-02.png',
                'video' => null,
                'link' => null,
            ],
            [
                'title_ar' => 'الملاعب الرياضية',
                'title_en' => 'Sports Fields',
                'image' => 'campus_tours/img-03.png',
                'video' => null,
                'link' => null,
            ],
            [
                'title_ar' => 'الفصول الدراسية',
                'title_en' => 'Classrooms',
                'image' => 'campus_tours/img-04.png',
                'video' => null,
                'link' => null,
            ],
             [
                'title_ar' => 'فيديو تعريفي',
                'title_en' => 'Introductory Video',
                'image' => null,
                'video' => 'campus_tours/video-01.mp4', // Assuming a video file exists or will be uploaded
                'link' => null,
            ],
             [
                'title_ar' => 'جولة افتراضية',
                'title_en' => 'Virtual Tour',
                'image' => null,
                'video' => null,
                'link' => 'https://www.youtube.com/watch?v=example',
            ],
        ];

        foreach ($tours as $tour) {
            // Check for duplicate based on title to avoid unique constraint errors if re-seeding without refresh
            if (!CampusTour::where('title_en', $tour['title_en'])->exists()) {
                 CampusTour::create($tour);
            }
        }
    }
}
