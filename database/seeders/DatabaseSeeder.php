<?php

namespace Database\Seeders;

use Database\Seeders\About\OneAboutSeeder;
use Database\Seeders\About\TwoAboutSeeder;
use Database\Seeders\Home\CounterSectionSeeder;
use Database\Seeders\Home\FaqSectionSeeder;
use Database\Seeders\Home\FaqSeeder;
use Database\Seeders\HomeSliderSeeder;
use Database\Seeders\Home\PartnerSeeder;
use Database\Seeders\Home\ResaleSeeder;
use Database\Seeders\Home\ServiceSeeder;
use Database\Seeders\TestimonialSeeder;
use Database\Seeders\Home\ProjectCategorySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HomeSliderSeeder::class,
            SettingSeeder::class,
//            FaqSeeder::class,
//            PartnerSeeder::class,
//            CounterSectionSeeder::class,
//            ServiceSeeder::class,
            OneAboutSeeder::class,
            ProjectCategorySeeder::class,
            TeamSeeder::class,
            TestimonialSeeder::class,
//            TwoAboutSeeder::class,
//            BlogSeeder::class,
            GallerySeeder::class,
            PolicySeeder::class,
            PropertyTypeSeeder::class,
            CompanySeeder::class,
            ProjectSeeder::class,
            AreaSeeder::class,
            ResaleSeeder::class,
            EducationalStageSeeder::class,
            ClassRoomSeeder::class,
            WhyChooseUsSeeder::class,
            CampusTourSeeder::class,
            StudentRegistrationSeeder::class,
        ]);
    }
}
