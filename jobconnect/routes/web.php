<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\PersonalDetailController;
use App\Http\Controllers\ProfessionalExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\LanguageController;


Route::get('/resumes/create', [ResumeController::class, 'create'])->name('resumes.create');
Route::get('/resumes/{id}', [ResumeController::class, 'show'])->name('resumes.show');
Route::post('/resumes', [ResumeController::class, 'store'])->name('resume.store');
Route::get('/', [ResumeController::class, 'index']);
Route::resource('user', UserController::class);
Route::resource('resume', ResumeController::class);
Route::resource('personal-detail', PersonalDetailController::class);
Route::resource('professional-experience', ProfessionalExperienceController::class);
Route::resource('education', EducationController::class);
Route::resource('skill', SkillController::class);
Route::resource('language', LanguageController::class);
