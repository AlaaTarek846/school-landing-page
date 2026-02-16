<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilityDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \App\Models\FacilityDetail::query()->delete();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $facility = \App\Models\Facility::first();

        if ($facility) {
            $details = [
                [
                    'title_ar' => 'أجهزة كمبيوتر',
                    'title_en' => 'Computers',
                    'count' => 50,
                    'facility_id' => $facility->id,
                ],
                [
                    'title_ar' => 'أجهزة عرض',
                    'title_en' => 'Projectors',
                    'count' => 10,
                    'facility_id' => $facility->id,
                ],
                [
                    'title_ar' => 'طابعات',
                    'title_en' => 'Printers',
                    'count' => 5,
                    'facility_id' => $facility->id,
                ],
                [
                    'title_ar' => 'سبورات ذكية',
                    'title_en' => 'Smart Boards',
                    'count' => 15,
                    'facility_id' => $facility->id,
                ],
            ];

            foreach ($details as $detail) {
                \App\Models\FacilityDetail::create($detail);
            }
        }
    }
}
