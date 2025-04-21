<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubProgram>
 */
class SubProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->lexify(),
            'title' => $this->faker->words(3, true),
            'level' => $this->faker->numberBetween(2, 5),
            'language' => $this->faker->randomElement(['English', 'Arabic']),
            'price' => $this->faker->numberBetween(1000, 5000),
            'program_id' => Program::inRandomOrder()->first()->id,
        ];
    }
}
