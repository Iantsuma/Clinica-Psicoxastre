<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Agenda;

class ProfileController extends Controller
{
    public readonly User $user;

    public function __construct()
    {
      $this->user = new User();
    }

    public function index()
    {
      
      return view('psicologa');
      
    }

    public function ficha()
    {
      return view('ficha');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Usuário excluído com sucesso!'], 200);
        } else {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    }

    public function ler()
    {
      $user = $this->user->where('role', 1)->get();
      return view('lerpaciente', ['user' => $user]);
    }

    public function create()
    {
      return view('cadastro');
    }

    public function secretaria()
    {
      return view('secretaria');
    }

    public function editar(string $id)
    {
      $user = $this->user->find($id);
      return view('editar',['user'=>$user]);
    }

    public function alterar(Request $request, string $id)
    {
        $user = $this->user->find($id);
        if ($user) {
            $updated = $user->update($request->except(['_token', '_method']));
            if ($updated) {
                // Atualiza o nome na tabela de agendas
                Agenda::where('user_id', $id)->update(['nome' => $request->input('nome')]);
                return view('psicologa');
            }
        }
        return view('psicologa')->withErrors(['Erro ao atualizar os dados do usuário.']);
    }
    

    public function store(Request $request)
    {
      $created = $this->user->create([
        'nome' => $request->input('nome'),
        'estado' => $request->input('estado'),
        'cep' => $request->input('cep'),
        'bairro' => $request->input('bairro'),
        'cidade' => $request->input('cidade'),
        'rua' => $request->input('rua'),
        'numero' => $request->input('numero'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'role' => 1,
      ]);

      if ($created) {
        return response()->json(['message' => 'Cliente criado com sucesso!'], 201);
    } else {
        return response()->json(['message' => 'Erro ao criar Cliente'], 500);
    }

    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function agendar()
{
    $role = 3; 
    $psicologos = User::where('role', $role)->get();
    return view('agendar', ['psicologos' => $psicologos]);
}


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    
}
