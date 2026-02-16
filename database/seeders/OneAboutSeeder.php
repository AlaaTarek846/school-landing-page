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
            'description_ar' => 'نحن ملتزمون بتوفير بيئة تعليمية متميزة تساعد الطلاب على تحقيق أقصى إمكاناتهم الأكاديمية والشخصية. نقدم مناهج دراسية متطورة وأنشطة متنوعة لتنمية مهارات الطلاب.',
            'title_en' => "About Our School",
            'description_en' => 'We are dedicated to providing an outstanding learning environment that helps students achieve their full academic and personal potential. We offer advanced curricula and diverse activities to develop student skills.'
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