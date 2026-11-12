<?php

namespace Database\Factories;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;

/**
 * @extends Factory<Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nosaukums' => ucfirst(fake()->word()),
            'ieguts' => fake()->numberBetween(1, 10),
            'svars' => fake()->randomFloat(3, 0, 1),
            'subject_id' => Subject::inRandomOrder()->first()->id, // izvēlas nejaušu "subjects" ierakstu un piešķir tā id
        ];
    }
}
