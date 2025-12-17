<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Admin Masjid',
            'email' => 'admin@masjid.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'no_hp' => '081234567890',
            'alamat' => 'Masjid An-Nur, Polinema',
        ]);

        User::create([
            'nama' => 'Takmir Masjid',
            'email' => 'takmir@masjid.com',
            'password' => Hash::make('password123'),
            'role' => 'takmir',
            'no_hp' => '081234567891',
            'alamat' => 'Masjid An-Nur, Polinema',
        ]);

        User::create([
            'nama' => 'Donatur 1',
            'email' => 'donatur1@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'donatur',
            'no_hp' => '081234567892',
            'alamat' => 'Jl. Pendidikan 1',
        ]);
    }
}
