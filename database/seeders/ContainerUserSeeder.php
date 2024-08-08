<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ContainerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $containerIds = DB::table('containers')->pluck('id');
        $userIds = DB::table('users')->pluck('id');

        foreach ($userIds as $userId) {
            foreach ($containerIds as $containerId) {
                DB::table('container_users')->insert([
                    'container_id' => $containerId,
                    'user_id' => $userId,
                    'user_container_cycle' => rand(1, 50),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
