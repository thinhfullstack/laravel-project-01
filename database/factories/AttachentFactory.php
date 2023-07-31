<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachent>
 */
class AttachentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_path' => fake()->url,
            'attachable_type' => 'int',
            'file_name' => fake()->fileExtension,
            'attachable_id' => 1,
            'extension' => 'google chrome',
            'mime_type' => 'jpg',
            'size' => '10000'
        ];
    }
}
