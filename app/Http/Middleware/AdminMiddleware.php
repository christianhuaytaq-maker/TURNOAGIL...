<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario NO está logueado o su rol NO es 1 (Admin), lo pateamos al inicio
        if (!auth()->check() || auth()->user()->rol_id != 1) {
            return redirect('/generar-turno')->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}
