<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDateTime = Carbon::now();

        DB::table('sections')->insert([
            'name' => 'Chương I',
            'course_id' => 1,
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        DB::table('sections')->insert([
            'name' => 'Chương II',
            'course_id' => 2,
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);
    }
}
