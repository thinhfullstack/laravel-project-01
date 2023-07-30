<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDateTime = Carbon::now();

        DB::table('users')->insert([
            'name' => 'John Doe',
            'phone' => '0835101510',
            'email' => 'john@example.com',
            'password' => bcrypt('123123'),
            'type' => 1,
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
            'deleted_at' => $currentDateTime,
        ]);

        DB::table('users')->insert([
            'name' => 'John Smith',
            'phone' => '0835101511',
            'email' => 'smith@example.com',
            'password' => bcrypt('123123'),
            'type' => 2,
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
            'deleted_at' => $currentDateTime,
        ]);
    }
}
