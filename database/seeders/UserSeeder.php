<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create([
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'role' => 'admin',
            'email' => 'kizarukaede@gmail.com',
            'password' => Hash::make('Ardya021'),
        ]);

        User::factory()->create([
            'role' => 'user',
            'email' => 'ardyapusaka@gmail.com',
            'password' => Hash::make('Ardya021'),
        ]);
    }
}
