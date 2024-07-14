<?php

namespace Database\Seeders;

use App\Models\Container;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $data = [];
        foreach (range(1, 50) as $index) {
            $data[] = [
            'type' => $faker->randomElement(['Type A', 'Type B', 'Type C', 'Type D']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
        }
        Container::insert($data);
    }
}
