<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerVagas;
use App\Http\Controllers\ControllerCandidato;
use App\Http\Controllers\VagasAdmController;


// Rota pública: página inicial de vagas
Route::get('/', [ControllerVagas::class, 'index'])->name('vagas.index');

// Rotas protegidas para Admin

      // página de criação de vagas
      Route::get('/vagas/create', [ControllerVagas::class, 'create'])->name('vagas.create');
      // adicionar vagas ao banco de dados
      Route::post('/vagas', [ControllerVagas::class, 'store'])->name('vagas.store');
      // mostrar as vagas
      Route::get('/vagas/{vaga}', [ControllerVagas::class, 'show'])->name('vagas.show');

      // retorna o formulário de edição de vagas
      Route::get('/vagas/{vagas}/edit', [ControllerVagas::class, 'edit'])->name('vagas.edit');
      // atualizar as vagas
      Route::put('/vagas/{vagas}', [ControllerVagas::class, 'update'])->name('vagas.update');
      // excluir as vagas
      Route::delete('/vagas/{vagas}', [ControllerVagas::class, 'destroy'])->name('vagas.destroy');
      // mostrar candidaturas
      Route::get('/vagas/{vaga}/candidaturas', [ControllerVagas::class, 'mostrarCandidaturas'])->name('vagas.candidaturas');
      

      // admin visualizar rotas 

      Route::get('/vagasadm', [VagasAdmController::class, 'index'])->name('vagasadm.index');
      Route::get('/vagasadm/{vaga}/edit', [VagasAdmController::class, 'edit'])->name('vagasadm.edit');
      Route::delete('/vagasadm/{vaga}', [VagasAdmController::class, 'destroy'])->name('vagasadm.destroy');
      Route::get('/vagasadm/{vaga}/candidatos', [VagasAdmController::class, 'candidatos'])->name('vagasadm.candidatos');
      

    
    // Perfil do candidato
    Route::get('/perfil', [ControllerCandidato::class, 'index'])->name('candidatos.index');
    
    // página de criação de candidato
    Route::get('/candidatos/create', [ControllerCandidato::class, 'create'])->name('candidatos.create');
    // adicionar candidato ao banco de dados
    Route::post('/candidatos', [ControllerCandidato::class, 'store'])->name('candidatos.store');
    // mostrar candidato
    Route::get('/candidatos/{post}', [ControllerCandidato::class, 'show'])->name('candidatos.show');
    // retorna o formulário de edição de candidato
    Route::get('/candidatos/{candidato}/edit', [ControllerCandidato::class, 'edit'])->name('candidatos.edit');
    // atualizar candidato
    Route::put('/candidatos/{candidato}', [ControllerCandidato::class, 'update'])->name('candidatos.update');
    // excluir candidato
    Route::delete('/candidatos/{candidato}', [ControllerCandidato::class, 'destroy'])->name('candidatos.destroy');
  



// candidatura 

Route::post('/vagas/join/{id}', [ControllerVagas::class, 'join'])->name('vagas.join');



Route::get('/candidaturas', [ControllerCandidato::class, 'candidaturas'])->name('candidato.candidaturas');