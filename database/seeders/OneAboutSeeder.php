<?php

namespace Database\Seeders;

use App\Models\AboutDetail;
use App\Models\OneAbout;
use Illuminate\Database\Seeder;

class OneAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        OneAbout::query()->delete();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $model = OneAbout::create([
            'title_ar' => "عن مدرستنا",
            'description_ar' => '<p>نحن ملتزمون بتوفير بيئة تعليمية متميزة تساعد الطلاب على تحقيق أقصى إمكاناتهم الأكاديمية والشخصية. نقدم مناهج دراسية متطورة وأنشطة متنوعة لتنمية مهارات الطلاب.</p><p>&nbsp;</p><ul><li>١. التميز الأكاديمي</li><li>٢. تنمية الشخصية</li><li>٣. الابتكار في التعليم</li><li>٤. بيئة تعليمية آمنة</li><li>٥. المشاركة المجتمعية</li><li>٦. دعم الطلاب الفردي</li><li>٧. التكنولوجيا التعليمية المتقدمة</li><li>٨. القيم والأخلاق</li></ul>',
            'title_en' => "About Our School",
            'description_en' => '<p>We are dedicated to providing an outstanding learning environment that helps students achieve their full academic and personal potential. We offer advanced curricula and diverse activities to develop student skills.</p><p>&nbsp;</p><ul><li>1. Academic Excellence</li><li>2. Character Development</li><li>3. Innovation in Education</li><li>4. Safe Learning Environment</li><li>5. Community Engagement</li><li>6. Individual Student Support</li><li>7. Advanced Educational Technology</li><li>8. Values and Ethics</li></ul>'
        ]);



        $model->media()->create([
            'name' =>  'first_photo',
            'size' => 444,
            'mime_type' => 'img.jpg',
            'identifier' => 'first_photo',
            'uploaded_by' =>  1,
            'url' => '/storage/oneAbout/achivements.jpg',
        ]);

    }
}