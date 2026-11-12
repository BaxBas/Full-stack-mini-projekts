<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
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
            'group_id' => fake()->optional(0.5)->passthrough(Group::inRandomOrder()->first()?->id), // iespēja pievienot group_id ir 50% (passthrough vajadzīgs priekš metodem, kas nav faker metodes)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Subject $subject) {
            // atzīmju skaits
            $numGrades = $this->faker->numberBetween(3, 5);

            $rawWeights = [];
            for ($i = 0; $i < $numGrades; $i++) {
                $rawWeights[] = $this->faker->numberBetween(1, 10);
            }

            $totalRaw = array_sum($rawWeights);

            // atzīmju svara normalizācija, lai kopā sanāktu 1 jeb 100%
            $weights = [];
            $runningSum = 0;

            for ($i = 0; $i < $numGrades; $i++) {
                if ($i === $numGrades - 1) {
                    // atlikušo svaru iedod pēdējai atzīmei
                    $weights[] = round(1.0 - $runningSum, 2);
                } else {
                    $w = round($rawWeights[$i] / $totalRaw, 2);
                    $weights[] = $w;
                    $runningSum += $w;
                }
            }

            // izveido atzīmes
            foreach ($weights as $weight) {
                $subject->grades()->create([
                    'nosaukums' => ucfirst(fake()->word()),
                    'ieguts' => fake()->optional(0.6)->numberBetween(1, 10),
                    'svars' => $weight,
                ]);
            }
        });
    }
}
