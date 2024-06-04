<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'user_id',
        'psi_id',
        'descricao',
        'status',
        'hora_inicio',
        'hora_fim',
        'tema',
        'avaliacao',
    ];
}
