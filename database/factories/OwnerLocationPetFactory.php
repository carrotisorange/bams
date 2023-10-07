<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
use App\Models\Pet;
use App\Models\Owner;
use Carbon\Carbon;

class OwnerLocationPetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'location_id' => Location::all()->random()->id,
                'owner_id' => Owner::all()->random()->id,
                'date_of_death' => Carbon::today()->subDays(rand(0, 365)),
                'pet_id' => Pet::all()->random()->id,
                'amount' => rand(100,1000000)
        ];
    }
}
