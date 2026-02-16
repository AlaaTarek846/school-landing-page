<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use Illuminate\Database\Seeder;

class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeSlider::truncate();

        $model = HomeSlider::create([
            'title_ar'       => "مرحباً بكم في مدرستنا",
            'title_color_ar' => "حيث يبدأ المستقبل",
            'description_ar' => 'نحن نسعى لتقديم أفضل تعليم لأبنائنا الطلاب وتوفير بيئة تعليمية متميزة تساعدهم على التفوق والإبداع.',
            'title_en'       => "Welcome to Our School",
            'title_color_en' => "Where Future Begins",
            'description_en' => 'We strive to provide the best education for our students and create an excellent learning environment that helps them excel and create.',
            'status'         => 1,
        ]);
     }
}
