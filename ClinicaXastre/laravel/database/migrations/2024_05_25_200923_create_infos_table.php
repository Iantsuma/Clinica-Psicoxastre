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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sessao_id');
            $table->string('data');
            $table->string('hora_inicio');
            $table->string('hora_fim');
            $table->string('tema');
            $table->string('avaliacao');
            $table->foreign('sessao_id')->references('id')->on('agendas')->onDelete('cascade');
            $table->timestamps();

            $table->unique('sessao_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
