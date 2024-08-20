<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrController;


Route::get('/', [CurrController::class, 'index']);


Route::get('/curriculo/create', [CurrController::class, 'create']);

