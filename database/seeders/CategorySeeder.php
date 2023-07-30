<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDateTime = Carbon::now();

        DB::table('categories')->insert([
            'name' => 'Laravel X',
            'slug' => 'laravel10',
            'parent' => 3,
            'created_by' => 1,
            'content' => 'Bài học về ORM Realationships',
            'meta_title' => 'khoá học laravel',
            'meta_desc' => 'mô tả khoá học',
            'meta_keyword' => 'laravel10x',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        DB::table('categories')->insert([
            'name' => 'Laravel 11',
            'slug' => 'laravel11',
            'parent' => 4,
            'created_by' => 2,
            'content' => 'Bài học về Model Database',
            'meta_title' => 'khoá học laravel 11',
            'meta_desc' => 'mô tả khoá học',
            'meta_keyword' => 'laravel11x',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);
    }
}
