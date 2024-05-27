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

    public function info($sessao_id)
    {
        $agendamento = Agenda::find($sessao_id);
        return view('info', ['agendamento' => $agendamento]);
    }
    
    public function documento(string $id)
    {
        $agenda = $this->agenda->find($id);
        return view('documento',['agenda'=>$agenda]);
    }

    public function editdoc(Request $request, string $id)
    {
      $updated = $this->agenda->where('id', $id)->update($request->except(['_token', '_method']));
      return view('ficha');

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

    public function anunciar()
    {
        $agendamentos = $this->agenda->where('status', 'agendado')->get();
        return view('anunciar', ['agenda' => $agendamentos]);
    }

    public function edit(string $id)
    {
        $updated = $this->agenda->where('id', $id)->update(['status' => 'em-espera']);
        return view('secretaria');
    }

    public function concluir(string $id)
    {
        $updated = $this->agenda->where('id', $id)->update(['status' => 'concluida']);
        return view('psicologa');
    }

    public function avisos()
    {
        $agenda = $this->agenda->where('status', 'em-espera')->get();
        return view('avisos', ['agenda' => $agenda]);
    }

    public function sessoes()
    {
        $agenda = $this->agenda->where('status', 'concluida')->get();
        return view('sessoes', ['agenda' => $agenda]);
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