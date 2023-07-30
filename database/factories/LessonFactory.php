<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
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
            'course_id' => Course::factory()->create()->id,
            'section_id' => Section::factory()->create()->id,
            'video_type' => fake()->numberBetween(1, 10),
            'video_url' => fake()->name(),
            'time' => fake()->name(),
            'preview' => fake()->boolean(),
            'content' => fake()->text(),
        ];
    }
}
