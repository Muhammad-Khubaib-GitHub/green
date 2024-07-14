<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        Role::insert($roles);
    }
}
