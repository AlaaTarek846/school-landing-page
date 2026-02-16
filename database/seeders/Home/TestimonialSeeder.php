<?php

namespace Database\Seeders\Home;

use App\Models\HomeSlider;
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

        $model = Testimonial::create([
            'name' => "خالد اشرف ",
            'description' => 'استخدم عالميًا منهجيات الفسفورية باستخدام تقنيات الويب. نسّق التجارة الإلكترونية التفاعلية عبر الإنترنت. ',
            'status' => 1,
            'job' => 'Web Designer',
        ]);

        $model->media()->create([
            'name' =>  $model['name'],
            'size' => 444,
            'mime_type' => 'sdd',
            'identifier' => null,
            'uploaded_by' =>  1,
            'url' => '/storage/testimonial/testimonial-one-client-img-1.png',
        ]);

        $model = Testimonial::create([
            'name' => "David Coper ",
            'description' => 'Worldwide engage phosfluorescently methodologies with in web-enabled technology. Interactively coordinate proactive e-commerce via.',
            'status' => 1,
            'job' => 'CEO & Founder',
        ]);

        $model->media()->create([
            'name' =>  $model['name'],
            'size' => 444,
            'mime_type' => 'sdd',
            'identifier' => null,
            'uploaded_by' =>  1,
            'url' => '/storage/testimonial/testimonial-one-client-img-2.png',
        ]);

        $model = Testimonial::create([
            'name' => "Robert Son ",
            'description' => 'Worldwide engage phosfluorescently methodologies with in web-enabled technology. Interactively coordinate proactive e-commerce via.',
            'status' => 1,
            'job' => 'CEO & Founder',
        ]);

        $model->media()->create([
            'name' =>  $model['name'],
            'size' => 444,
            'mime_type' => 'sdd',
            'identifier' => null,
            'uploaded_by' =>  1,
            'url' => '/storage/testimonial/testimonial-one-client-img-3.png',
        ]);

     }
}
