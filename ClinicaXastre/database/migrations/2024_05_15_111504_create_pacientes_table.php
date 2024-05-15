<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Nome completo do paciente
            $table->string('cep'); // CEP do paciente
            $table->string('rua'); // Rua do endereço do paciente
            $table->string('bairro'); // Bairro do endereço do paciente
            $table->string('cidade'); // Cidade do endereço do paciente
            $table->string('estado'); // Estado do endereço do paciente
            $table->string('numero'); // Número de celular do paciente
            $table->timestamps(); // Cria os campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}