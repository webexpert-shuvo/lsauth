<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name'  => 'Super Admin',
            'slug'  => Str::slug('Super Admin'),
        ]);
        Role::create([

            'name'  => 'Admin',
            'slug'  => Str::slug('Admin'),
        ]);
        Role::create([

            'name'  => 'Teacher',
            'slug'  => Str::slug('Teacher'),
        ]);

    }
}
