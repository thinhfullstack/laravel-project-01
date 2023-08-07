<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'facebook_url' => fake()->url,
            'twitter_url' => fake()->url,
            'youtube_url' => fake()->url,
            'zalo_phone' => fake()->e164PhoneNumber(),
            'other_info' => fake()->url,
            'user_id' => fake()->numberBetween(1, 100)
        ];
    }
}
