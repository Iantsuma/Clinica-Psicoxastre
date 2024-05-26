<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'sessao_id',
        'data',
        'hora_inicio',
        'hora_fim',
        'tema',
        'avaliacao',
    ];
}
