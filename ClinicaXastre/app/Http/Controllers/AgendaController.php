<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public readonly Agenda $agenda;

    public function __construct()
    {
      $this->agenda = new Agenda();
    }
    
    public function index(){
        return view('cliente');
    }

    public function create()
    {
      return view('agendar');
    }

    public function store(Request $request)
    {
        $created = $this->agenda->create([
            'nome' => $request->input('nome'),
            'user_id' => $request->input('id_user'),
            'descricao' => $request->input('descricao'),
            'status' => $request->input('status'),
        ]);

        if ($created) {
            return response()->json(['message' => 'Agendamento criado com sucesso!'], 201);
        } else {
            return response()->json(['message' => 'Erro ao criar agendamento'], 500);
        }
    }

    public function ler()
    {
        $userId = auth()->id();
        $agenda = $this->agenda->where('user_id', $userId)->get();
        return view('historico', ['agenda' => $agenda]);
    }

    public function read()
    {
        $userId = auth()->id();
        $agenda = $this->agenda->where('user_id', $userId)
                                ->whereIn('status', ['agendado', 'em-espera'])
                                ->get();
                                
        return view('historico', ['agenda' => $agenda]);
    }
}