<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerVagas;
use App\Http\Controllers\ControllerCandidato;


// Rota pública: página inicial de vagas
Route::get('/', [ControllerVagas::class, 'index'])->name('vagas.index');

// Rotas protegidas para Admin
Route::middleware(['auth', 'admin'])->group(function () {

      // página de criação de vagas
      Route::get('/vagas/create', [ControllerVagas::class, 'create'])->name('vagas.create');
      // adicionar vagas ao banco de dados
      Route::post('/vagas', [ControllerVagas::class, 'store'])->name('vagas.store');
      // mostrar as vagas
      Route::get('/vagas/{post}', [ControllerVagas::class, 'show'])->name('vagas.show');
      // retorna o formulário de edição de vagas
      Route::get('/vagas/{vagas}/edit', [ControllerVagas::class, 'edit'])->name('vagas.edit');
      // atualizar as vagas
      Route::put('/vagas/{vagas}', [ControllerVagas::class, 'update'])->name('vagas.update');
      // excluir as vagas
      Route::delete('/vagas/{vagas}', [ControllerVagas::class, 'destroy'])->name('vagas.destroy');
  
});

// Rotas protegidas para Candidato
Route::middleware(['auth', 'candidato'])->group(function () {
    
    // Perfil do candidato
    Route::get('/perfil', [ControllerCandidato::class, 'index'])->name('candidato.index');
    
    // página de criação de candidato
    Route::get('/candidato/create', [ControllerCandidato::class, 'create'])->name('candidato.create');
    // adicionar candidato ao banco de dados
    Route::post('/candidato', [ControllerCandidato::class, 'store'])->name('candidato.store');
    // mostrar candidato
    Route::get('/candidato/{post}', [ControllerCandidato::class, 'show'])->name('candidato.show');
    // retorna o formulário de edição de candidato
    Route::get('/candidato/{candidato}/edit', [ControllerCandidato::class, 'edit'])->name('candidato.edit');
    // atualizar candidato
    Route::put('/candidato/{candidato}', [ControllerCandidato::class, 'update'])->name('candidato.update');
    // excluir candidato
    Route::delete('/candidato/{candidato}', [ControllerCandidato::class, 'destroy'])->name('candidato.destroy');


});
