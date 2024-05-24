<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

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

    public function ler()
    {
      $user = $this->user->all();
      return view('lerpaciente', ['user' => $user]);
    }

    public function create()
    {
      return view('cadastro');
    }

    public function editar(string $id)
    {
      
      $user = $this->user->find($id);
      return view('editar',['user'=>$user]);
    }

    public function alterar(Request $request, string $id)
    {
      $updated = $this->user->where('id', $id)->update($request->except(['_token', '_method']));
      return view('psicologa');

    }
    

    public function store(Request $request)
    {
      $created = $this->user->create([
        'nome' => 'Pedro',
        'estado' => 'Bahia',
        'cep' => '1341',
        'bairro' => 'iufhuh',
        'cidade' => 'aojdfa',
        'rua' => 'ojasfoa',
        'numero' => '1298734',
        'email' => 'iadjfhijh',
        'password' => '1982347',
        'role' => 1,
      ]);
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
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
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
