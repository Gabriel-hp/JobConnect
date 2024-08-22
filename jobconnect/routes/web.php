<?php

use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

// Rotas para o controller ResumeController
Route::middleware(['auth'])->group(function () {
    Route::get('/', [ResumeController::class, 'index']);
    Route::get('/resumes', [ResumeController::class, 'index'])->name('resumes.index');
    Route::get('/resumes/create', [ResumeController::class, 'create'])->name('resumes.create');
    Route::post('/resumes', [ResumeController::class, 'store'])->name('resumes.store');
    Route::get('/resumes/{id}', [ResumeController::class, 'show'])->name('resumes.show');
    Route::get('/resumes/{id}/edit', [ResumeController::class, 'edit'])->name('resumes.edit');
    Route::put('/resumes/{id}', [ResumeController::class, 'update'])->name('resumes.update');
    Route::delete('/resumes/{id}', [ResumeController::class, 'destroy'])->name('resumes.destroy');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
