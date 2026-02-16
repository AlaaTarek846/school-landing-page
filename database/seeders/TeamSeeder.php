<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::truncate();

        $data = [
            [
                'name_ar' => 'محمود أحمد',
                'name_en' => 'Mahmoud Ahmed',
                'job_ar' => 'مدير المدرسة',
                'job_en' => 'School Principal',
                'image' => 'img-1.jpg',
            ],
            [
                'name_ar' => 'فاطمة الزهراء',
                'name_en' => 'Fatima Al-Zahra',
                'job_ar' => 'مدرسة رياضيات',
                'job_en' => 'Math Teacher',
                'image' => 'img-2.jpg',
            ],
             [
                'name_ar' => 'علي مصطفى',
                'name_en' => 'Ali Mustafa',
                'job_ar' => 'مدرس علوم',
                'job_en' => 'Science Teacher',
                'image' => 'img-3.jpg',
            ],
             [
                'name_ar' => 'منى كريم',
                'name_en' => 'Mona Kareem',
                'job_ar' => 'أخصائية اجتماعية',
                'job_en' => 'Social Worker',
                'image' => 'img-4.jpg',
            ],
        ];

        foreach ($data as $item) {
            $image = $item['image'];
            unset($item['image']);
            
            $team = Team::create($item);

             $team->media()->create([
                'name' => $item['name_en'],
                'size' => 444,
                'mime_type' => 'image/jpeg',
                'identifier' => 'team',
                'uploaded_by' => 1,
                'url' => '/storage/team/' . $image,
            ]);
        }
    }
}