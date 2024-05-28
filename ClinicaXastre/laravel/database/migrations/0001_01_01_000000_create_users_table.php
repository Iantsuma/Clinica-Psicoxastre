<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(); // Nome completo do paciente
            $table->string('cep')->nullable(); // CEP do paciente
            $table->string('rua')->nullable(); // Rua do endereço do paciente
            $table->string('bairro')->nullable(); // Bairro do endereço do paciente
            $table->string('cidade')->nullable(); // Cidade do endereço do paciente
            $table->string('estado')->nullable(); // Estado do endereço do paciente
            $table->string('numero')->nullable(); // Número de celular do paciente
            $table->string('email')->unique();
            $table->integer('role');
            $table->integer('idpsi')->nullable()->index(); // Add an index to the idpsi column
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
