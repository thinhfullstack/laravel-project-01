<?php

namespace Database\Seeders;

use App\Models\Attachent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttachentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attachent::factory()->count(10)->create();
    }
}
