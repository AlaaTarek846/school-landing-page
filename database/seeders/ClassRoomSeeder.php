<?php

namespace Database\Seeders;

use App\Models\CampusTour;
use App\Models\ClassRoom;
use App\Models\EducationalStage;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ClassRoom::truncate();
        // KG
        $kg = EducationalStage::where('title_en', 'Kindergarten')->first();
        if ($kg) {
            ClassRoom::create(['title_ar' => 'كي جي 1', 'title_en' => 'KG 1', 'educational_stage_id' => $kg->id]);
            ClassRoom::create(['title_ar' => 'كي جي 2', 'title_en' => 'KG 2', 'educational_stage_id' => $kg->id]);
        }

        // Primary
        $primary = EducationalStage::where('title_en', 'Primary Stage')->first();
        if ($primary) {
            for ($i = 1; $i <= 6; $i++) {
                ClassRoom::create([
                    'title_ar' => 'الصف ' . $this->numberToArabic($i) . ' الابتدائي',
                    'title_en' => 'Grade ' . $i,
                    'educational_stage_id' => $primary->id
                ]);
            }
        }

        // Preparatory
        $prep = EducationalStage::where('title_en', 'Preparatory Stage')->first();
        if ($prep) {
            for ($i = 1; $i <= 3; $i++) {
                ClassRoom::create([
                    'title_ar' => 'الصف ' . $this->numberToArabic($i) . ' الإعدادي',
                    'title_en' => 'Grade ' . $i,
                    'educational_stage_id' => $prep->id
                ]);
            }
        }

        // Secondary
        $sec = EducationalStage::where('title_en', 'Secondary Stage')->first();
        if ($sec) {
            for ($i = 1; $i <= 3; $i++) {
                ClassRoom::create([
                    'title_ar' => 'الصف ' . $this->numberToArabic($i) . ' الثانوي',
                    'title_en' => 'Grade ' . $i,
                    'educational_stage_id' => $sec->id
                ]);
            }
        }
    }

    private function numberToArabic($number)
    {
        $arabicNumbers = [
            1 => 'الأول',
            2 => 'الثاني',
            3 => 'الثالث',
            4 => 'الرابع',
            5 => 'الخامس',
            6 => 'السادس'
        ];
        return $arabicNumbers[$number] ?? $number;
    }
}
