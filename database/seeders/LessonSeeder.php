<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lessons')->insert([
            'name' => 'Bài học 1',
            'course_id' => 1,
            'section_id' => 1,
            'video_type' => 2,
            'video_url' => 'https://www.youtube.com/watch',
            'time' => 'Ngày 23 tháng 08 năm 2023',
            'preview' => true,
            'content' => 'Bài học về lập trình là con đường thành công'
        ]);

        DB::table('lessons')->insert([
            'name' => 'Bài học 2',
            'course_id' => 2,
            'section_id' => 1,
            'video_type' => 2,
            'video_url' => 'https://www.youtube.com/watch',
            'time' => 'Ngày 23 tháng 08 năm 2023',
            'preview' => true,
            'content' => 'Bài học về lập trình là con đường thành công'
        ]);
    }
}
