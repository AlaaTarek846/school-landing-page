<?php

namespace Database\Seeders;

use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WhyChooseUs::truncate();
        
        $items = [
            [
                'title_ar' => 'تعليم متميز',
                'title_en' => 'Excellent Education',
                'description_ar' => 'نقدم تعليماً متميزاً يواكب التطورات العالمية ويهتم بتنمية مهارات الطلاب.',
                'description_en' => 'We provide excellent education that keeps pace with global developments and focuses on developing student skills.',
                'image' => 'why_choose_us/img-01.png', 
            ],
            [
                'title_ar' => 'أنشطة متنوعة',
                'title_en' => 'Diverse Activities',
                'description_ar' => 'نوفر مجموعة واسعة من الأنشطة الرياضية والثقافية والفنية لتنمية مواهب الطلاب.',
                'description_en' => 'We offer a wide range of sports, cultural, and artistic activities to develop student talents.',
                'image' => 'why_choose_us/img-02.png', 
            ],
            [
                'title_ar' => 'بيئة آمنة',
                'title_en' => 'Safe Environment',
                'description_ar' => 'نحرص على توفير بيئة تعليمية آمنة ومحفزة لجميع الطلاب.',
                'description_en' => 'We are committed to providing a safe and stimulating learning environment for all students.',
                'image' => 'why_choose_us/img-03.png', 
            ],
             [
                'title_ar' => 'كادر مؤهل',
                'title_en' => 'Qualified Staff',
                'description_ar' => 'يضم فريقنا نخبة من المعلمين المؤهلين ذوي الخبرة والكفاءة العالية.',
                'description_en' => 'Our team includes a group of qualified teachers with high experience and efficiency.',
                'image' => 'why_choose_us/img-04.png', 
            ],
            [
                'title_ar' => 'تكنولوجيا حديثة',
                'title_en' => 'Modern Technology',
                'description_ar' => 'نستخدم أحدث التقنيات التعليمية لتعزيز تجربة التعلم لدى الطلاب.',
                'description_en' => 'We use the latest educational technologies to enhance the students learning experience.',
                'image' => 'why_choose_us/img-05.png', 
            ],
            [
                'title_ar' => 'دعم مجتمعي',
                'title_en' => 'Community Support',
                'description_ar' => 'نبني جسور التواصل مع المجتمع لتعزيز القيم والمسؤولية الاجتماعية.',
                'description_en' => 'We build bridges of communication with the community to promote values and social responsibility.',
                'image' => 'why_choose_us/img-06.png', 
            ],
        ];

        foreach ($items as $item) {
            WhyChooseUs::create($item);
        }
    }
}
