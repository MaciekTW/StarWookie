<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CharactersSeeder;
use Database\Seeders\PlanetsSeeder;
use Database\Seeders\VehiclesSeeder;
use Database\Seeders\StarshipsSeeder;
use Database\Seeders\SpeciesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PlanetsSeeder::class);
        $this->call(CharactersSeeder::class);
        $this->call(VehiclesSeeder::class);
        $this->call(StarshipsSeeder::class);
        $this->call(SpeciesSeeder::class);
    }
}
