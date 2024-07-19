<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin',     'slug' => Str::slug('Admin'), 'created_at' => now(), 'updated_at' => now() ],
            ['name' => 'Invester',  'slug' => Str::slug('Invester'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Viewer',    'slug' => Str::slug('Viewer'), 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Role::truncate();

        Role::insert($roles);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
