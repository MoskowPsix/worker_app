<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Worker;

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
            'worker_id' => Worker::factory(),
            "city" => fake() ->city,
            'skill' => fake() ->jobTitle,
            'experience' => fake()->numberBetween(2, 20),
            'finish_study_at' => fake() -> date,
        ];
    }
}
