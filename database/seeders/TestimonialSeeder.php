<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::truncate();

        $data = [
            [
                'name_ar' => 'أحمد محمد',
                'name_en' => 'Ahmed Mohamed',
                'job_ar' => 'ولي أمر',
                'job_en' => 'Parent',
                'description_ar' => 'مدرسة رائعة جداً، أطفالي سعداء جداً بتواجدهم هنا.',
                'description_en' => 'Very great school, my children are very happy to be here.',
                'image' => 'img-1.jpg',
            ],
            [
                'name_ar' => 'سارة علي',
                'name_en' => 'Sara Ali',
                'job_ar' => 'طالبة سابقة',
                'job_en' => 'Alumni',
                'description_ar' => 'التعليم هنا ممتاز ويساعد على تطوير المهارات الشخصية.',
                'description_en' => 'The education here is excellent and helps develop personal skills.',
                'image' => 'img-2.jpg',
            ],
            [
                'name_ar' => 'محمد حسن',
                'name_en' => 'Mohamed Hassan',
                'job_ar' => 'ولي أمر',
                'job_en' => 'Parent',
                'description_ar' => 'الإدارة متعاونة جداً والمعلمون أكفاء.',
                'description_en' => 'The administration is very cooperative and the teachers are competent.',
                'image' => 'img-3.jpg',
            ],
            [
                'name_ar' => 'ليلى محمود',
                'name_en' => 'Laila Mahmoud',
                'job_ar' => 'طالبة',
                'job_en' => 'Student',
                'description_ar' => 'أحب نشاطات المدرسة والبيئة التعليمية.',
                'description_en' => 'I love the school activities and the educational environment.',
                'image' => 'img-4.jpg',
            ],
        ];

        foreach ($data as $item) {
            $image = $item['image'];
            unset($item['image']);

            $testimonial = Testimonial::create($item);

            $testimonial->media()->create([
                'name' => $item['name_en'],
                'size' => 444,
                'mime_type' => 'image/jpeg',
                'identifier' => 'testimonial',
                'uploaded_by' => 1,
                'url' => '/storage/testimonial/' . $image,
            ]);
        }
    }
}
