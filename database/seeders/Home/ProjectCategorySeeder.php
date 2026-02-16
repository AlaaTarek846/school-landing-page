<?php

namespace Database\Seeders\Home;

use App\Models\Faq;
use App\Models\Service;
use App\Models\File;
use App\Models\ServiceFaq;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ProjectCategorises = [
            [
                'title_ar' => 'علامة تجارية',
                'title_en' => 'Branding',
            ],
            [
                'title_ar' => 'التصميم',
                'title_en' => 'Design',
            ],
            [
                'title_ar' => 'تطوير',
                'title_en' => 'Development',
            ],
            [
                'title_ar' => 'تحليل البيانات',
                'title_en' => 'Data Analysis',
            ],
            [
                'title_ar' => 'إدارة المشاريع',
                'title_en' => 'Project Management',
            ],
        ];

        foreach ($ProjectCategorises as $ProjectCategory) {
            \App\Models\ProjectCategory::create($ProjectCategory);
        }

    }
}