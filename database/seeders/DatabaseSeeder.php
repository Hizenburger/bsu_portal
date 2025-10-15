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
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        Announcement::create([
            'title' => 'First Announcement',
            'content' => 'This is the content of the first Announcement'
        ]);
    }
}
