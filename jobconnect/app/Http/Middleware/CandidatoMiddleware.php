<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CandidatoMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isCandidato()) {
            return $next($request);
        }

        return redirect('/'); // ou redirecionar para uma página de acesso negado
    }
}


