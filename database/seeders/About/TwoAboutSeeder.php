<?php

namespace Database\Seeders\About;

use App\Models\AboutDetail;
use App\Models\CounterAbout;
use App\Models\OneAbout;
use App\Models\TwoAbout;
use Illuminate\Database\Seeder;

class TwoAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $model = TwoAbout::create([
            'link' => 'http://www.youtube.com/watch?v=1iIZeIy7TqM',
        ]);

        $model->setTranslations([
            'ar' => [
                'title' => "حلم رؤيوي رائع نراه لعملائنا",
                'description' => 'لكن يجب أن أشرح لك كيف ولدت كل هذه الفكرة الخاطئة المتمثلة في إدانة السرور ومدح الألم ، وسأقدم لك وصفًا كاملاً للنظام ، وأشرح التعاليم الفعلية للمستكشف العظيم للحقيقة ، الباني البارع. السعادة البشرية. لا أحد يرفض أو يكره أو يتجنب المتعة نفسها ، لأنها متعة ، ولكن لأن أولئك الذين لا يعرفون كيفية السعي وراء المتعة يواجهون عواقب مؤلمة للغاية. ولا يوجد أيضًا أي شخص'
            ],
            'en' => [
                'title' => "Wonderful visionary dream we see for our client’s",
                'description' => 'Nec platea est metus imperdiet litora natoque eros posuere ac venenatis eifend, ante tincidunt non felis magna et orci massa facilisi quis, aliquet duis aptent feugiat habitasse integer mauris penatibus sem tempor. Justo conubia convallis cum posuere curae.'
            ],
        ]);

        $aboutDetail1 = CounterAbout::create(['count' => '656','icon' => 'renova-glove']);
        $aboutDetail2 = CounterAbout::create(['count' => '290','icon' => 'renova-rank']);
        $aboutDetail3 = CounterAbout::create(['count' => '21','icon' => 'renova-feedback']);
        $aboutDetail4 = CounterAbout::create(['count' => '344','icon' => 'renova-happy']);

        $aboutDetail1->setTranslations([
            'ar' => [
                'title' => "البلد العالمي",
                'description' => ''
            ],
            'en' => [
                'title' => "Global Country",
                'description' => ''
            ],
        ]);
        $aboutDetail2->setTranslations([
            'ar' => [
                'title' => "نمو الشركة",
                'description' => ''
            ],
            'en' => [
                'title' => "Company Growth",
                'description' => ''
            ],
        ]);
        $aboutDetail3->setTranslations([
            'ar' => [
                'title' => "العملاء الراضون",
                'description' => ''
            ],
            'en' => [
                'title' => "Satisfied Customers",
                'description' => ''
            ],
        ]);
        $aboutDetail4->setTranslations([
            'ar' => [
                'title' => "تقييم العملاء",
                'description' => ''
            ],
            'en' => [
                'title' => "Customer Rating",
                'description' => ''
            ],
        ]);
    }
}