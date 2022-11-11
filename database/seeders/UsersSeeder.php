<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'password' => '12345678',
            'role' => 'pegawai'
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => '12345678',
            'role' => 'customer'
        ]);
    }
}
