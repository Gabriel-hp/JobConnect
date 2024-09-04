<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerVagas;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
