<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get valid stage and class IDs to avoid foreign key constraint errors
        $stageId = DB::table('educational_stages')->value('id');
        $classId = DB::table('classes')->value('id');

        if (!$stageId || !$classId) {
            $this->command->info('Please seed Educational Stages and Classes first.');
            return;
        }

        $students = [
            [
                'student_name' => 'Ahmed Mohamed',
                'educational_stage_id' => $stageId,
                'class_id' => $classId,
                'birth_date' => '2015-05-15',
                'phone' => '01012345678',
                'email' => 'ahmed.mohamed@example.com',
                'notes' => 'Excellent student',
                'pdf' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'student_name' => 'Sarah Ali',
                'educational_stage_id' => $stageId,
                'class_id' => $classId,
                'birth_date' => '2016-08-20',
                'phone' => '01234567890',
                'email' => 'sarah.ali@example.com',
                'notes' => 'Needs support in Math',
                'pdf' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'student_name' => 'Omar Khaled',
                'educational_stage_id' => $stageId,
                'class_id' => $classId,
                'birth_date' => '2015-03-10',
                'phone' => '01122334455',
                'email' => 'omar.khaled@example.com',
                'notes' => null,
                'pdf' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'student_name' => 'Layla Hassan',
                'educational_stage_id' => $stageId,
                'class_id' => $classId,
                'birth_date' => '2016-11-05',
                'phone' => '01555667788',
                'email' => null,
                'notes' => 'New admission',
                'pdf' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'student_name' => 'Youssef Ibrahim',
                'educational_stage_id' => $stageId,
                'class_id' => $classId,
                'birth_date' => '2015-01-25',
                'phone' => '01099887766',
                'email' => 'youssef.ibrahim@example.com',
                'notes' => 'Sibling in higher grade',
                'pdf' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('student_registrations')->insert($students);
    }
}
