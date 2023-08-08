<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'start_at' => fake()->dateTimeBetween('now', '+1 day')->format('Y-m-d H:i'),
            'end_at' => fake()->dateTimeBetween('+1 day', '+7 days')->format('Y-m-d H:i'),
            'is_suppension' => fake()->numberBetween(0, 1),
        ];
    }
}
