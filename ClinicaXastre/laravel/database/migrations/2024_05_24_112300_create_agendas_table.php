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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Campo para o nome
            $table->unsignedBigInteger('user_id'); // Campo para o id_user
            $table->integer('psi_id');
            $table->text('descricao'); // Campo para a descrição
            $table->string('status'); // Campo para o status
            $table->timestamps();
            $table->string('hora_inicio')->nullable();
            $table->string('hora_fim')->nullable();
            $table->string('tema')->nullable();
            $table->string('avaliacao')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('psi_id')->references('idpsi')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
