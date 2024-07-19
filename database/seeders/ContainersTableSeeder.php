<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Country;
use App\Models\Container;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $countryIds = Country::pluck('id')->all();

        $userIds = User::pluck('id')->all();

        $data = [];
        foreach (range(1, 50) as $index) {
            $processingDate = $faker->dateTimeBetween('-1 year', 'now');
            $returnDate = (clone $processingDate)->modify('+35 days');

            $data[] = [
                'type' => $faker->randomElement(['Type A', 'Type B', 'Type C', 'Type D']),
                'country_id' => $faker->randomElement($countryIds),
                'ship_address' => $faker->address,
                'user_id' => $faker->randomElement($userIds),
                'processing_date' => $processingDate->format('d-m-Y'),
                'return_date' => $returnDate->format('d-m-Y'),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ];
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Container::truncate();

        Container::insert($data);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
