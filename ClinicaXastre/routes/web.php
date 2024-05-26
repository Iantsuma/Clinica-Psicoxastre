<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InfoController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/cliente', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/cliente/agendar', [AgendaController::class, 'create'])->name('agenda.create');
Route::post('/cliente/agendar/sessao', [AgendaController::class, 'store'])->name('agenda.store');
Route::get('/cliente/historico', [AgendaController::class, 'ler'])->name('agenda.ler');
Route::get('/cliente/proximas', [AgendaController::class, 'read'])->name('agenda.read');

Route::get('/secretaria', [ProfileController::class, 'secretaria'])->name('profile.secretaria');
Route::get('/secretaria/paciente', [ProfileController::class, 'create'])->name('profile.create');
Route::get('/secretaria/anunciar', [AgendaController::class, 'anunciar'])->name('agenda.anunciar');
Route::post('/secretaria/paciente/cadastro', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/secretaria/anunciar/editar/{id}', [AgendaController::class, 'edit'])->name('agenda.edit');

Route::get('/psicologa', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/psicologa/ficha', [ProfileController::class, 'ficha'])->name('profile.ficha');
Route::get('/psicologa/ficha/sessoes', [AgendaController::class, 'sessoes'])->name('agenda.sessoes');
Route::get('/psicologa/ficha/sessoes/info/{id}', [AgendaController::class, 'info'])->name('agenda.info');
Route::post('/psicologa/ficha/sessoes/info/store', [InfoController::class, 'store'])->name('info.store');

Route::get('/psicologa/ficha/sessoes/documentos/{id}', [AgendaController::class, 'documento'])->name('agenda.documento');
Route::put('/psicologa/ficha/sessoes/documentos/{id}/alterar', [AgendaController::class, 'editdoc'])->name('agenda.editdoc');

Route::get('/psicologa/avisos', [AgendaController::class, 'avisos'])->name('agenda.avisos');
Route::get('/psicologa/avisos/{id}', [AgendaController::class, 'concluir'])->name('agenda.concluir');
Route::get('/psicologa/ficha/ler', [ProfileController::class, 'ler'])->name('profile.ler');
Route::get('/psicologa/ficha/ler/editar/{user}', [ProfileController::class, 'editar'])->name('profile.editar');
Route::put('/psicologa/ficha/ler/editar/{user}/alterar', [ProfileController::class, 'alterar'])->name('profile.alterar');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';