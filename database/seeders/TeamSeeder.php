<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Partner;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::truncate();

        $teams = [
            [
                'name' => "JORDHAN LEON",
                'job' => "Company Owner",
                'url' => '/storage/team/1.jpg',
            ],
            [
                'name' => "DEVIT KILLER",
                'job' => "Sales Manager",
                'url' => '/storage/team/2.jpg',
            ],
            [
                'name' => "MORAH JEIN",
                'job' => "Manager",
                'url' => '/storage/team/3.jpg',
            ],
            [
                'name' => "KILIN WARD",
                'job' => "Head of Optop",
                'url' => '/storage/team/4.jpg',
            ],
            [
                'name' => "ENDON JEMS",
                'job' => "Special Support",
                'url' => '/storage/team/5.jpg',
            ],
            [
                'name' => "LIAM WARD",
                'job' => "Product Manager",
                'url' => '/storage/team/6.jpg',
            ],
        ];

        foreach ($teams as $team) {
            $model = Team::create([
                'name' => $team['name'],
                'job' => $team['job'],
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