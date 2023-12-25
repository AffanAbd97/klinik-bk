<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Akun::insert([[
            'id'=>Str::uuid(),
            'nama' => 'Akun ADMIN',
            'email' => 'admin@gmail.com',
            'peran' =>'Admin',
            'password' => Hash::make('12345678'),
        ],
        [
            'id'=>Str::uuid(),
            'nama' => 'Akun Dokter',
            'email' => 'dokter@gmail.com',
            'peran' =>'Dokter',
            'password' => Hash::make('12345678'),
        ]]);
    }
}
