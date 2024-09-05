<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerVagas;
use App\Http\Controllers\ControllerCandidato;


//rotas para vagas
Route::resource('vagas', ControllerVagas::class);

// pagina inicial de vagas onde será publicada as vagas
Route::get('/', ControllerVagas::class .'@index')->name('vagas.index');

// página de criação de vagas
Route::get('/vagas/create', ControllerVagas::class . '@create')->name('vagas.create');
// add vagas ao banco de dados
Route::post('/vagas', ControllerVagas::class .'@store')->name('vagas.store');
// mostrar as vagas
Route::get('/vagas/{post}', ControllerVagas::class .'@show')->name('vagas.show');
// retorna o updates vagas
Route::get('/vagas/{vagas}/edit', ControllerVagas::class .'@edit')->name('vagas.edit');
// updates a vagas
Route::put('/vagas/{vagas}', ControllerVagas::class .'@update')->name('vagas.update');
// deletes a vagas
Route::delete('/vagas/{vagas}', ControllerVagas::class .'@destroy')->name('vagas.destroy');

//rotas candidato
Route::resource('candidatos', ControllerCandidato::class);

// pagina inicial do candidato
Route::get('/inicio', ControllerCandidato::class .'@index')->name('candidato.index');

// página de criação de vagas
Route::get('/candidato/create', ControllerCandidato::class . '@create')->name('candidato.create');
// add candidato ao banco de dados
Route::post('/candidato', ControllerCandidato::class .'@store')->name('candidato.store');
// mostrar as candidato
Route::get('/candidato/{post}', ControllerCandidato::class .'@show')->name('candidato.show');
// retorna o updates candidato
Route::get('/candidato/{candidato}/edit', ControllerCandidato::class .'@edit')->name('candidato.edit');
// updates a candidato
Route::put('/candidato/{candidato}', ControllerCandidato::class .'@update')->name('candidato.update');
// deletes a candidato
Route::delete('/candidato/{candidato}', ControllerCandidato::class .'@destroy')->name('candidato.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
