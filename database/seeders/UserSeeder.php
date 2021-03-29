<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

            'name'      => 'Super Admin',
            'role_id'   =>  '1',
            'email'     => 'superadmin@gmail.com',
            'password'  => Hash::make('1234'),

        ]);

        User::create([

            'name'      => 'Admin',
            'role_id'   =>  '2',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('1234'),

        ]);

        User::create([

            'name'      => 'Teacher',
            'role_id'   =>  '3',
            'email'     => 'teacher@gmail.com',
            'password'  => Hash::make('1234'),

        ]);


    }
}
