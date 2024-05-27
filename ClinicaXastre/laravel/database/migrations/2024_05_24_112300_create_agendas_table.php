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
            $table->text('descricao'); // Campo para a descrição
            $table->string('status'); // Campo para o status
            $table->timestamps();
            $table->text('encaminhamentos')->nullable();
            $table->text('atestados')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
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
