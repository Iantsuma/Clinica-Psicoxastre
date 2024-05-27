<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\Agenda;

class InfoController extends Controller
{
    public readonly Info $info;

    public function __construct()
    {
        $this->info = new Info();
    }

    public function store(Request $request)
{
    \Log::info('Requisição recebida', $request->all()); // Adicione esta linha para logar os dados recebidos

    $created = $this->info->create([
        'sessao_id' => $request->input('sessao_id'),
        'data' => $request->input('data'),
        'hora_fim' => $request->input('hora_fim'),
        'hora_inicio' => $request->input('hora_inicio'),
        'tema' => $request->input('tema'),
        'avaliacao' => $request->input('avaliacao'),
    ]);

    if ($created) {
        return response()->json(['message' => 'Informação inserida com sucesso!'], 201);
    } else {
        return response()->json(['message' => 'Erro ao inserir informação'], 500);
    }
}

}
