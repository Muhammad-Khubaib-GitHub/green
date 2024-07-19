<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
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
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'cnic' => $this->generateCnic($faker),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'parent_id' => null,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ];
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();

        User::insert( $data);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function generateCnic($faker)
    {
        $part1 = $faker->numberBetween(10000, 99999);
        $part2 = $faker->numberBetween(1000000, 9999999);
        $part3 = $faker->numberBetween(1, 9);
        return "$part1-$part2-$part3";
    }

}
