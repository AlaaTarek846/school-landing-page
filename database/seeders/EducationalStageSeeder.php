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
        $stages = [
            [
                'title_ar' => 'رياض الأطفال',
                'title_en' => 'Kindergarten',
                'image' => null, 
            ],
            [
                'title_ar' => 'المرحلة الابتدائية',
                'title_en' => 'Primary Stage',
                'image' => null,
            ],
            [
                'title_ar' => 'المرحلة الإعدادية',
                'title_en' => 'Preparatory Stage',
                'image' => null,
            ],
            [
                'title_ar' => 'المرحلة الثانوية',
                'title_en' => 'Secondary Stage',
                'image' => null,
            ],
        ];

        foreach ($stages as $stage) {
            EducationalStage::create($stage);
        }
    }
}
