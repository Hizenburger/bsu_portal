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
            'profile_picture' => 'storage/app/private/public/img/profile-picture/MARCH7.jpg',
        ]);
        User::create([
            'first_name' => 'Student',
            'last_name'  => 'User',
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'profile_picture' => 'storage/img/announcements/kafka.jpg',
        ]);

        Announcement::create([
            'user_id' => 2,
            'title' => 'Student Announcement',
            'content' => 'This is the content of the first Announcement',
            'image_url' => 'storage/img/announcements/announcement1.jpg'
        ]);

        for ($i = 0; $i < 50; $i++) {
            Announcement::create([
                'user_id' => 1,
                'title' => 'First Announcement',
                'content' => 'This is the content of the first Announcement',
                'image_url' => 'storage/img/announcements/announcement2.webp'
            ]);
        }


    }
}
