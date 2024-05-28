<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nome' => 'Secretaria',
            'email' => 'secretaria@secretaria.com',
            'password' => Hash::make('12345678'), 
            'role' => 2,
        ]);

        User::create([
            'nome' => 'Psicologa',
            'email' => 'psicologa@psicologa.com',
            'password' => Hash::make('12345678'), 
            'role' => 3,
        ]);
    }
}