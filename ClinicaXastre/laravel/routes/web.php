<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/document/{id}', function($id){
    // Obtenha o usuário pelo ID
    $user = \App\Models\User::findOrFail($id);

    // Gera o PDF a partir da view 'document'
    $pdf = PDF::loadView('atestado', ['user' => $user]);

    // Retorna o PDF para download
    return $pdf->download('certificado_medico.pdf');
});

Route::post('/encaminhamento', function(Request $request){
    $text = $request->input('text');

    // Gera o PDF a partir da view 'encaminhamento' e passa o texto como dado
    $pdf = PDF::loadView('encaminhamento', compact('text'));

    // Retorna o PDF para download
    return $pdf->download('encaminhamento_medico.pdf');
})->name('encaminhamento');

Route::middleware(['auth'])->group(function () {
    // Rotas para psicologa
    Route::get('/psicologa', function() {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(ProfileController::class)->index();
        }
        return redirect('/');
    })->name('profile.index');

    Route::get('/psicologa/ficha', function() {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(ProfileController::class)->ficha();
        }
        return redirect('/');
    })->name('profile.ficha');

    Route::get('/psicologa/ficha/sessoes', function() {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(AgendaController::class)->sessoes();
        }
        return redirect('/');
    })->name('agenda.sessoes');

    Route::get('/psicologa/ficha/sessoes/info/{id}', function($id) {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(AgendaController::class)->info($id);
        }
        return redirect('/');
    })->name('agenda.info');

    Route::post('/psicologa/ficha/sessoes/info/store', function(Request $request) {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(InfoController::class)->store($request);
        }
        return redirect('/');
    })->name('info.store');

    Route::get('/psicologa/ficha/sessoes/documentos', function() {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(AgendaController::class)->documento();
        }
        return redirect('/');
    })->name('agenda.documento');

    Route::get('/psicologa/avisos', function() {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(AgendaController::class)->avisos();
        }
        return redirect('/');
    })->name('agenda.avisos');

    Route::get('/psicologa/avisos/{id}', function($id) {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(AgendaController::class)->concluir($id);
        }
        return redirect('/');
    })->name('agenda.concluir');

    Route::get('/psicologa/ficha/ler', function() {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(ProfileController::class)->ler();
        }
        return redirect('/');
    })->name('profile.ler');

    Route::get('/psicologa/ficha/ler/editar/{user}', function($user) {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(ProfileController::class)->editar($user);
        }
        return redirect('/');
    })->name('profile.editar');

    Route::put('/psicologa/ficha/ler/editar/{user}/alterar', function(Request $request, $user) {
        if (Auth::check() && Auth::user()->role === 3) {
            return app(ProfileController::class)->alterar($request, $user);
        }
        return redirect('/');
    })->name('profile.alterar');
    
    // Rotas para cliente (role 1)
    Route::get('/cliente', function() {
        if (Auth::check() && Auth::user()->role === 1) {
            return app(AgendaController::class)->index();
        }
        return redirect('/');
    })->name('agenda.index');

    Route::get('/cliente/agendar', function() {
        if (Auth::check() && Auth::user()->role === 1) {
            return app(ProfileController::class)->agendar();
        }
        return redirect('/');
    })->name('profile.agendar');

    Route::post('/cliente/agendar/sessao', function(Request $request) {
        if (Auth::check() && Auth::user()->role === 1) {
            return app(AgendaController::class)->store($request);
        }
        return redirect('/');
    })->name('agenda.store');

    Route::get('/cliente/historico', function() {
        if (Auth::check() && Auth::user()->role === 1) {
            return app(AgendaController::class)->ler();
        }
        return redirect('/');
    })->name('agenda.ler');

    Route::get('/cliente/proximas', function() {
        if (Auth::check() && Auth::user()->role === 1) {
            return app(AgendaController::class)->read();
        }
        return redirect('/');
    })->name('agenda.read');

    // Rotas para secretaria (role 2)
    Route::get('/secretaria', function() {
        if (Auth::check() && Auth::user()->role === 2) {
            return app(ProfileController::class)->secretaria();
        }
        return redirect('/');
    })->name('profile.secretaria');

    Route::get('/secretaria/paciente', function() {
        if (Auth::check() && Auth::user()->role === 2) {
            return app(ProfileController::class)->create();
        }
        return redirect('/');
    })->name('profile.create');

    Route::get('/secretaria/anunciar', function() {
        if (Auth::check() && Auth::user()->role === 2) {
            return app(AgendaController::class)->anunciar();
        }
        return redirect('/');
    })->name('agenda.anunciar');

    Route::post('/secretaria/paciente/cadastro', function(Request $request) {
        if (Auth::check() && Auth::user()->role === 2) {
            return app(ProfileController::class)->store($request);
        }
        return redirect('/');
    })->name('profile.store');

    Route::get('/secretaria/anunciar/editar/{id}', function($id) {
        if (Auth::check() && Auth::user()->role === 2) {
            return app(AgendaController::class)->edit($id);
        }
        return redirect('/');
    })->name('agenda.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('AuthenticatedSession.destroy');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('AuthenticatedSession.create');

require __DIR__.'/auth.php';
