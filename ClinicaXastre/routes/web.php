<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/paciente', [PacienteController::class, 'create'])->name('paciente.create');
Route::post('/paciente/cadastro', [PacienteController::class, 'store'])->name('paciente.store');
Route::get('/psicologa', [PacienteController::class, 'index'])->name('paciente.index');
Route::get('/psicologa/ler', [PacienteController::class, 'ler'])->name('paciente.ler');
Route::get('/psicologa/ler/editar/{paciente}', [PacienteController::class, 'editar'])->name('paciente.editar');
Route::put('/psicologa/ler/editar/{paciente}/alterar', [PacienteController::class, 'alterar'])->name('paciente.alterar');

