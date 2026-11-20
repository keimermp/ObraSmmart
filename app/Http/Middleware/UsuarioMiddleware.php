<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsuarioMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->rol_id !== 2) {
            abort(
                403,
                'Esta sección está disponible únicamente para usuarios.'
            );
        }

        return $next($request);
    }
}