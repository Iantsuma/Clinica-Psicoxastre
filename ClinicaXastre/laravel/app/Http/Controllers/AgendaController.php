<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\User;

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

    public function info($sessao_id)
    {
        $agendamento = Agenda::find($sessao_id);
        return view('info', ['agendamento' => $agendamento]);
    }
    
    public function documento()
    {
        return view('documento');
    }

    public function editdoc(Request $request, string $id)
    {
        // Atualizar apenas o campo 'encaminhamentos'
        $updated = $this->agenda->where('id', $id)->update(['encaminhamentos' => $request->input('encaminhamentos')]);
    
        // Redirecionar para a rota /encaminhamento/{id} para gerar o PDF
        return redirect()->route('encaminhamento', ['id' => $id]);
    }
    


    public function store(Request $request)
    {
        $created = $this->agenda->create([
            'nome' => $request->input('nome'),
            'user_id' => $request->input('id_user'),
            'descricao' => $request->input('descricao'),
            'status' => $request->input('status'),
            'psi_id' => $request->input('psi_id'),
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
        $agenda = $this->agenda->where('user_id', $userId)
                        ->join('users', 'agendas.psi_id', '=', 'users.id')
                        ->select('agendas.*', 'users.nome as psi_nome')
                        ->get();
        return view('historico', ['agenda' => $agenda]);
    }

    public function anunciar()
    {
        $agendamentos = $this->agenda->where('status', 'agendado')
                              ->join('users', 'agendas.psi_id', '=', 'users.idpsi')
                              ->select('agendas.*', 'users.nome as psi_nome')
                              ->get();
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
        $id = auth()->user()->idpsi;
        $agenda = $this->agenda->where('psi_id', $id)->where('status', 'em-espera')->get();
        return view('avisos', ['agenda' => $agenda]);
    }

    public function sessoes()
    {
        $id = auth()->user()->idpsi;
        $agenda = $this->agenda->where('psi_id', $id)->where('status', 'concluida')->get();
        return view('sessoes', ['agenda' => $agenda]);
    }

    public function read()
    {
        $userId = auth()->id();
        $agenda = $this->agenda->where('user_id', $userId)
                        ->whereIn('status', ['agendado', 'em-espera'])
                        ->join('users', 'agendas.psi_id', '=', 'users.id')
                        ->select('agendas.*', 'users.nome as psi_nome')
                        ->get();
        return view('historico', ['agenda' => $agenda]);
    }
}

