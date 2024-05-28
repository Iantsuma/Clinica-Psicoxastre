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
            'nome' => 'Joana',
            'email' => 'joana@psicologa.com',
            'idpsi' => 1,
            'password' => Hash::make('12345678'), 
            'role' => 3,
        ]);

        User::create([
            'nome' => 'Catarina',
            'email' => 'catarina@psicologa.com',
            'idpsi' => 2,
            'password' => Hash::make('12345678'), 
            'role' => 3,
        ]);

        User::create([
            'nome' => 'Rudiger',
            'email' => 'rudiger@psicologa.com',
            'idpsi' => 3,
            'password' => Hash::make('12345678'), 
            'role' => 3,
        ]);
    }
}