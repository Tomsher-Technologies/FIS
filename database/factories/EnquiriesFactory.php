<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EnquiriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'content' => $this->faker->text(191),
            'status' => 1
        ];
    }
}
