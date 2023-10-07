<?php

namespace Database\Seeders;

use App\Models\OwnerLocationPet;
use Illuminate\Database\Seeder;

class OwnerLocationPetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OwnerLocationPet::factory(10)->create();
    }
}
