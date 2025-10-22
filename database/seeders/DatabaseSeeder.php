<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'first_name' => 'admin',
            'last_name'  => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'profile_picture' => 'img/profile-pictures/Default_pfp.svg',
        ]);
        User::create([
            'first_name' => 'Student',
            'last_name'  => 'User',
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'profile_picture' => 'img/profile-pictures/Default_pfp.svg',
        ]);

        Announcement::create([
            'user_id' => 2,
            'title' => 'Student Announcement',
            'content' => 'This is the content of the first Announcement',
            'image' => 'storage/img/announcements/announcement1.jpg'
        ]);

        for ($i = 0; $i < 19; $i++) {
            Announcement::create([
                'user_id' => 1,
                'title' => 'First Announcement',
                'content' => 'This is the content of the first Announcement',
                'image' => 'storage/img/announcements/announcement2.webp'
            ]);
        }


    }
}
