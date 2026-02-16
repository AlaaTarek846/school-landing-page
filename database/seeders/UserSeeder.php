<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create admin user
        User::firstOrCreate([
            'email' => 'admin@admin.com',
        ],[
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => '123123123',
            'email_verified_at' => now(),
        ]);


     }
}
