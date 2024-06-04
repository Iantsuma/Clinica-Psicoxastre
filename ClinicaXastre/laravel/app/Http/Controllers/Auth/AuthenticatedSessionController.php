<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        Auth::logout();
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    // Obter o usuário autenticado
    $user = $request->user();

    // Verificar a role do usuário e redirecionar de acordo
    if ($user->role == 1) {
        return redirect()->intended('/cliente');
    } elseif ($user->role == 2) {
        return redirect()->intended('/secretaria');
    } elseif ($user->role == 3) {
        return redirect()->intended('/psicologa');
    }

    // Redirecionamento padrão caso a role não seja nenhuma das especificadas
    return redirect()->intended(url('/login'));
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
