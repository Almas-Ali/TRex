<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class commentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->text(),
            'user' => $this->faker->numberBetween(1, 10),
            'post' => $this->faker->numberBetween(1, 10),
        ];
    }
}
