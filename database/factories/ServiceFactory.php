<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service' => $this->faker->word(),
            'price' => $this->faker->randomNumber(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
