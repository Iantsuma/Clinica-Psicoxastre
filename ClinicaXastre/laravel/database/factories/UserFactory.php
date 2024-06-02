<?php
// database/factories/UserFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cep' => $this->faker->postcode,
            'rua' => $this->faker->streetAddress,
            'bairro' => $this->faker->city,
            'cidade' => $this->faker->city,
            'estado' => $this->faker->state,
            'numero' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'role' => $this->faker->randomElement([1, 2, 3]),
            'idpsi' => $this->faker->boolean ? $this->faker->unique()->numberBetween(1, 100) : null,
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }
}

// database/factories/AgendaFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
    protected $model = \App\Models\Agenda::class;

    public function definition()
    {
        $user = \App\Models\User::factory()->create();
        $psi = \App\Models\User::factory()->create(['idpsi' => $this->faker->unique()->numberBetween(1, 100)]);

        return [
            'nome' => $this->faker->word,
            'user_id' => $user->id,
            'psi_id' => $psi->idpsi,
            'descricao' => $this->faker->paragraph,
            'status' => 'pending',
        ];
    }
}

// database/factories/InfoFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InfoFactory extends Factory
{
    protected $model = \App\Models\Info::class;

    public function definition()
    {
        $agenda = \App\Models\Agenda::factory()->create();

        return [
            'sessao_id' => $agenda->id,
            'data' => $this->faker->date,
            'hora_inicio' => $this->faker->time,
            'hora_fim' => $this->faker->time,
            'tema' => $this->faker->sentence,
            'avaliacao' => $this->faker->sentence,
        ];
    }
}

