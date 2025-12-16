<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'   => $this->faker->name(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'phone'  => $this->faker->phoneNumber(),
            'email'  => $this->faker->unique()->safeEmail(),
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode($this->faker->name()),
        ];
    }
}
