<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Staff HRD",
            'email' => "staff@gmail.com",
            'password' => Hash::make('admin123'),
            'role_id' => 1
        ]);

        User::create([
            'name' => "Supervisor",
            'email' => "spv@gmail.com",
            'password' => Hash::make('admin123'),
            'role_id' => 2
        ]);
    }
}
