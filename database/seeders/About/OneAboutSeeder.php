<?php

namespace Database\Seeders\About;

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

        $model = OneAbout::create([
            'title_ar' => "نعمل من أجلك",
            'title_color_ar' => "مهمتنا ورؤيتنا",
            'description_ar' => 'ضع استراتيجيات بقاء رابحة للجميع لضمان الهيمنة الاستباقية. في نهاية المطاف، من الآن فصاعدًا، أصبح الوضع الطبيعي الجديد، الذي تطور من الوضع التشغيلي X، على وشك الظهور.',
            'title_en' => "Working For You",
            'title_color_en' => "Our mission & vission",
            'description_en' => 'Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day going forward, a new normal that has evolved from operational X is on the runway.'
        ]);

        $aboutDetail1 = AboutDetail::create([
            'one_about_id' => $model->id,
            'title_ar' =>  "نرتقي فوق الجميع، سقفًا بعد سقف",
            'title_en' => "Rising Above the Rest Roof by Roof",
        ]);
        $aboutDetail2 = AboutDetail::create([
            'one_about_id' => $model->id,
            'title_ar' => "ارفع مأواك ارفع حياتك",
            'title_en' => "Elevate Your Shelter Elevate Your Life",
        ]);

        $model->media()->create([
            'name' =>  'first_photo',
            'size' => 444,
            'mime_type' => 'img.jpg',
            'identifier' => 'first_photo',
            'uploaded_by' =>  1,
            'url' => '/storage/oneAbout/about-img.jpg',
        ]);

    }
}