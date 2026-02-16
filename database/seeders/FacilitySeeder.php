<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \App\Models\Facility::query()->delete();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $facilities = [
            [
                'title_ar' => 'تجهيزات المدرسة',
                'title_en' => 'School Facilities',
                'description_ar' => 'معامل حديثة ومجهزة بأحدث التقنيات',
                'description_en' => 'Modern labs equipped with the latest technology',
                'image' => 'facilities/achivements.jpg',
            ]
        ];

        foreach ($facilities as $facility) {
            \App\Models\Facility::create($facility);
        }
    }
}
