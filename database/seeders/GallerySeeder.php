<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Team;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::truncate();

        $teams = [
            [
                'name' => " gallery-1",
                'url' => '/storage/gallery/gallery-1.jpg',
            ],
            [
                'name' => " gallery-2",
                'url' => '/storage/gallery/gallery-2.jpg',
            ],
            [
                'name' => " gallery-3",
                'url' => '/storage/gallery/gallery-3.jpg',
            ],
            [
                'name' => " gallery-4",
                'url' => '/storage/gallery/gallery-4.jpg',
            ],
            [
                'name' => " gallery-5",
                'url' => '/storage/gallery/gallery-5.jpg',
            ],
            [
                'name' => " gallery-6",
                'url' => '/storage/gallery/gallery-6.jpg',
            ],
            [
                'name' => " gallery-7",
                'url' => '/storage/gallery/gallery-7.jpg',
            ],
            [
                'name' => " gallery-8",
                'url' => '/storage/gallery/gallery-8.jpg',
            ],
            [
                'name' => " gallery-8",
                'url' => '/storage/gallery/gallery-8.jpg',
            ],
        ];

        foreach ($teams as $team) {
            $model = Gallery::create([
                'status' => 1
            ]);
            $model->media()->create([
                'name' =>  $team['name'],
                'size' => 444,
                'mime_type' => 'sdd',
                'identifier' => null,
                'uploaded_by' =>  1,
                'url' => $team['url'],
            ]);
        }

    }
}