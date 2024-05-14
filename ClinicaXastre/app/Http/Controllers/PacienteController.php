<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public readonly Paciente $paciente;

    public function __construct()
    {
      $this->paciente = new Paciente();
    }

    public function index()
    {
      return view('psicologa');
    }

    public function ler()
    {
      $paciente = $this->paciente->all();
      return view('lerpaciente', ['paciente' => $paciente]);
    }

    public function create()
    {
      return view('cadastro');
    }

    public function editar(string $id)
    {
      
      $paciente = $this->paciente->find($id);
      return view('editar',['paciente'=>$paciente]);
    }

    public function alterar(Request $request, string $id)
    {
      $updated = $this->paciente->where('id', $id)->update($request->except(['_token', '_method']));
      return view('psicologa');

    }
    

    public function store(Request $request)
    {
      $created = $this->paciente->create([
        'nome' => $request->input('nome'),
        'endereco' => $request->input('endereco'),
        'numero' => $request->input('numero'),
      ]);

      return view('welcome');
    }
}
