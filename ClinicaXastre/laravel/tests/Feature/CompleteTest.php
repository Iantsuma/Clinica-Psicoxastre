<?php

// tests/Feature/CompleteTest.php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use App\Models\Agenda;
use Illuminate\Support\Facades\Schema;

class CompleteTest extends TestCase
{
    use DatabaseTransactions; // Use transações de banco de dados

    // Testes de Rotas
    public function test_rota_home()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_rotas_autenticadas()
    {
        $user = User::factory()->create(['role' => 1]);

        $this->actingAs($user);

        $response = $this->get('/cliente');
        $response->assertStatus(200);
    }

    public function test_rota_psicologa()
    {
        $user = User::factory()->create(['role' => 3]);

        $this->actingAs($user);

        $response = $this->get('/psicologa');
        $response->assertStatus(200);
    }

    public function test_rota_secretaria()
    {
        $user = User::factory()->create(['role' => 2]);

        $this->actingAs($user);

        $response = $this->get('/secretaria');
        $response->assertStatus(200);
    }

    public function test_redirecionamento_nao_autenticado()
    {
        $response = $this->get('/psicologa');
        $response->assertRedirect('/login');
    }

    // Testes de Migrações
    public function test_migracao_tabela_usuarios()
    {
        $this->assertTrue(Schema::hasTable('users'));
    }

    public function test_migracao_tabela_agendas()
    {
        $this->assertTrue(Schema::hasTable('agendas'));
    }

    // Testes de Modelos
    public function test_criacao_usuario()
    {
        $user = User::factory()->create(['email' => 'test@example.com']);
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    public function test_criacao_agenda()
    {
        $agenda = Agenda::factory()->create();
        $this->assertDatabaseHas('agendas', ['id' => $agenda->id]);
    }

    // Teste para atualização de usuário
    public function test_atualizacao_usuario()
    {
        $user = User::factory()->create(['email' => 'update@example.com']);
        $user->update(['email' => 'updated@example.com']);
        $this->assertDatabaseHas('users', ['email' => 'updated@example.com']);
    }

    // Teste para exclusão de agenda
    public function test_exclusao_agenda()
    {
        $agenda = Agenda::factory()->create();
        $agenda->delete();
        $this->assertDatabaseMissing('agendas', ['id' => $agenda->id]);
    }
}
