<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['email' => 'ali@gmail.com'], ['name' => 'Ali', 'password' => Hash::make('password')]);
        User::firstOrCreate(['email' => 'ayse@gmail.com'], ['name' => 'Ayşe', 'password' => Hash::make('password')]);
        User::firstOrCreate(['email' => 'mehmet@gmail.com'], ['name' => 'Mehmet', 'password' => Hash::make('password')]);
    }
}