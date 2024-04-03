<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameSession>
 */
class GameSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'memo_test_id' => \App\Models\MemoTest::factory()->create()->id,
            'retries' => $this->faker->randomNumber(),
            'number_of_pairs' => $this->faker->randomNumber(),
            'state' => 'STARTED',
            'score' => $this->faker->randomFloat(),
        ];
    }
}
