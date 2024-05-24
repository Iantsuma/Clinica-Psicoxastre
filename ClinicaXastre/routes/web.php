<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/cliente', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/cliente/agendar', [AgendaController::class, 'create'])->name('agenda.create');
Route::post('/cliente/agendar/sessao', [AgendaController::class, 'store'])->name('agenda.store');
Route::get('/cliente/historico', [AgendaController::class, 'ler'])->name('agenda.ler');
Route::get('/cliente/proximas', [AgendaController::class, 'read'])->name('agenda.read');

Route::get('/paciente', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/paciente/cadastro', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/psicologa', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/psicologa/ler', [ProfileController::class, 'ler'])->name('profile.ler');
Route::get('/psicologa/ler/editar/{user}', [ProfileController::class, 'editar'])->name('profile.editar');
Route::put('/psicologa/ler/editar/{user}/alterar', [ProfileController::class, 'alterar'])->name('profile.alterar');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';