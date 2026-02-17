<?php

namespace Database\Seeders;

use App\Models\CampusTour;
use Illuminate\Database\Seeder;

class CampusTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        CampusTour::query()->delete();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        // Ensure we have categories
        $categories = \App\Models\CampusTourCategory::pluck('id')->toArray();
        if (empty($categories)) {
            // Fallback if no categories exist, though they should if Seeders run in order
            $category = \App\Models\CampusTourCategory::create([
                'title_ar' => 'عام',
                'title_en' => 'General',
            ]);
            $categories = [$category->id];
        }

        $items = [
            ['type' => 'image', 'value' => '/storage/campus_tours/images/img-1.jpg'],
            ['type' => 'image', 'value' => '/storage/campus_tours/images/img-2.jpg'],
            ['type' => 'video', 'value' => '/storage/campus_tours/videos/WhatsApp Video 2025-04-08 at 14.49.191.mp4'],
            ['type' => 'link',  'value' => 'https://www.youtube.com/watch?v=ubidK6mSWDE'],
            ['type' => 'image', 'value' => '/storage/campus_tours/images/img-3.jpg'],
            ['type' => 'image', 'value' => '/storage/campus_tours/images/img-4.jpg'],
            ['type' => 'video', 'value' => '/storage/campus_tours/videos/WhatsApp Video 2025-04-08 at 14.49.192.mp4'],
            ['type' => 'link',  'value' => 'https://www.youtube.com/watch?v=FFgfcAsNIg4'],
            ['type' => 'image', 'value' => '/storage/campus_tours/images/img-5.jpg'],
            ['type' => 'image', 'value' => '/storage/campus_tours/images/img-6.jpg'],
            ['type' => 'video', 'value' => '/storage/campus_tours/videos/WhatsApp Video 2025-04-08 at 14.49.193.mp4'],
            ['type' => 'link',  'value' => 'https://www.youtube.com/watch?v=gZxQaZn7tv0'],
            ['type' => 'image', 'value' => '/storage/campus_tours/images/img-7.jpg'],
            ['type' => 'image', 'value' => '/storage/campus_tours/images/img-8.jpg'],
            ['type' => 'video', 'value' => '/storage/campus_tours/videos/WhatsApp Video 2025-04-08 at 14.49.194.mp4'],
            ['type' => 'link',  'value' => 'https://www.youtube.com/watch?v=WEfb1cyV5aI'],
        ];

        foreach ($items as $index => $item) {
            $data = [
                'title_ar' => 'جولة بالمدرسة ' . ($index + 1),
                'title_en' => 'Campus Tour ' . ($index + 1),
                'campus_tour_category_id' => $categories[$index % count($categories)],
                'image' => null,
                'video' => null,
                'link' => null,
            ];

            if ($item['type'] === 'image') {
                $data['image'] = $item['value'];
                $data['type'] = 'image';
            } elseif ($item['type'] === 'video') {
                $data['video'] = $item['value'];
                $data['type'] = 'video';
            } elseif ($item['type'] === 'link') {
                $data['link'] = $item['value'];
                $data['type'] = 'link';
            }

            CampusTour::create($data);
        }
    }
}
