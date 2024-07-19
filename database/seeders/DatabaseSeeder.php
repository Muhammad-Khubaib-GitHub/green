<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ContainersTableSeeder::class);
        $this->call(ShipmentsTableSeeder::class);

    }
}
