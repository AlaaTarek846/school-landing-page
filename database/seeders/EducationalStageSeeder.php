<?php

namespace Database\Seeders;

use App\Models\EducationalStage;
use Illuminate\Database\Seeder;

class EducationalStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        EducationalStage::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $stages = [
            [
                'title_ar' => 'رياض الأطفال',
                'title_en' => 'Kindergarten',
                'description_ar' => 'مرحلة تأسيسية تهدف إلى تنمية مهارات الطفل الحركية واللغوية والاجتماعية في بيئة آمنة ومحفزة.',
                'description_en' => 'A foundational stage aimed at developing the child\'s motor, linguistic, and social skills in a safe and stimulating environment.',
            ],
            [
                'title_ar' => 'المرحلة الابتدائية',
                'title_en' => 'Primary Stage',
                'description_ar' => 'تركز هذه المرحلة على بناء المعرفة الأساسية وتعزيز القيم الأخلاقية وحب التعلم لدى الطلاب.',
                'description_en' => 'This stage focuses on building basic knowledge and promoting moral values and a love for learning among students.',
            ],
            [
                'title_ar' => 'المرحلة الإعدادية',
                'title_en' => 'Preparatory Stage',
                'description_ar' => 'تهدف إلى تعميق المعرفة العلمية وتنمية مهارات التفكير النقدي والاستقلالية في التعلم.',
                'description_en' => 'Aims to deepen scientific knowledge and develop critical thinking skills and independence in learning.',
            ],
            [
                'title_ar' => 'المرحلة الثانوية',
                'title_en' => 'Secondary Stage',
                'description_ar' => 'إعداد الطلاب للتعليم الجامعي من خلال مناهج متطورة وتوجيه أكاديمي ومهني متميز.',
                'description_en' => 'Preparing students for university education through advanced curricula and distinguished academic and career guidance.',
            ],
        ];

        foreach ($stages as $stage) {
            EducationalStage::create($stage);
        }
    }
}
