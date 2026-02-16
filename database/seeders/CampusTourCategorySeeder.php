<?php

namespace Database\Seeders;

use App\Models\CampusTourCategory;
use Illuminate\Database\Seeder;

class CampusTourCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title_ar' => 'الفصول الدراسية',
                'title_en' => 'Classrooms',
            ],
            [
                'title_ar' => 'المعامل',
                'title_en' => 'Laboratories',
            ],
            [
                'title_ar' => 'الملاعب',
                'title_en' => 'Playgrounds',
            ],
        ];

        foreach ($categories as $category) {
            CampusTourCategory::create($category);
        }
    }
}
