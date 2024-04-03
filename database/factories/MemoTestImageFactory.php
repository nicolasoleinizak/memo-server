<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemoTestImage>
 */
class MemoTestImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomMemoTestId = \App\Models\MemoTest::factory()->create()->id;

        return [
            'id' => $this->faker->unique()->randomNumber(),
            'url' => $this->faker->url(),
            'memo_test_id' => $randomMemoTestId,
        ];
    }
}
