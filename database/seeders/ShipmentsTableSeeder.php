<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Shipment;
use App\Models\Container;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $faker = Faker::create();

            $containerIds = Container::pluck('id')->toArray();
            $userIds = User::pluck('id')->toArray();
            $data = [];

            foreach (range(1, 50) as $index) {
                $processingDate = $faker->dateTimeBetween('-1 year', 'now');
                $returnDate = (clone $processingDate)->modify('+35 days');
                $data[] = [
                    'amount' => $faker->randomFloat(2, 100, 10000),
                    'profit' => $faker->randomFloat(2, 10, 1000),
                    'container_id' => $faker->randomElement($containerIds),
                    'return_date' => $returnDate->format('d-m-Y'),
                    'processing_date' => $processingDate->format('d-m-Y'),
                    'current_date' => $processingDate->format('d-m-Y'),
                    'user_id' => $faker->randomElement($userIds),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => null,
                ];
            }
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            Shipment::truncate();

            Shipment::insert($data);

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
