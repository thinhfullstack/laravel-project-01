<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([AttachentSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([CourseSeeder::class]);
        $this->call([CourseUserSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([SectionSeeder::class]);
        $this->call([LessonSeeder::class]);
        $this->call([FamilySeeder::class]);
        $this->call([ProfileSeeder::class]);
        $this->call([NewsSeeder::class]);
    }
}
