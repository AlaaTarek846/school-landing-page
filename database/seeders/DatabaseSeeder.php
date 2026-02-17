<?php

namespace Database\Seeders;



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
            OneAboutSeeder::class,
            TeamSeeder::class,
            TestimonialSeeder::class,
            PolicySeeder::class,
            EducationalStageSeeder::class,
            ClassRoomSeeder::class,
            WhyChooseUsSeeder::class,
            CampusTourSeeder::class,
            StudentRegistrationSeeder::class,
            FacilitySeeder::class,
            FacilityDetailSeeder::class,
        ]);
    }
}
