<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Address;

use Illuminate\Database\Eloquent\Factories\Factory;

class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'id' => rand(1,100000),
                'name' => $this->faker->name(),
                'mobile_number' => rand(11111111111,999999999),
                'address_id' => Address::all()->random()->id

            ];
    }
}
