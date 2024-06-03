<?php

// tests/Feature/TesteCompleto.php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Info;
use Illuminate\Support\Facades\Schema;

class ExampleTest extends TestCase
{
    use DatabaseTransactions; // Use transações de banco de dados

    // Testes de Rotas
    public function test_rota_home()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}