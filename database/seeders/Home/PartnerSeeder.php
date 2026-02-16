<?php

namespace Database\Seeders\Home;

use App\Models\Faq;
use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::truncate();

        $Partners = [
            [
                'link' => 'https://www.youtube.com/watch?v=Get7rqXYrbQ',
                'url' => '/storage/partner/video-one-bg.jpg',
            ],
        ];

        foreach ($Partners as $Partner) {
            $model = Partner::create([
                'url' => $Partner['link'],
            ]);
            $model->media()->create([
                'name' =>  'partner',
                'size' => 444,
                'mime_type' => 'sdd',
                'identifier' => null,
                'uploaded_by' =>  1,
                'url' => $Partner['url'],
            ]);
        }

    }
}