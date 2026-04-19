<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForcarAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$tipos)
{
    if (!auth()->check()) {
        return redirect()->route('logar')->with('autenticacao','Faça login para acessar esta página!') ;
    }

    $user = auth()->user();

    if (!in_array($user->tipo_utilizador, $tipos)) {
        abort(403, 'Sem permissão');
    }
    

    return $next($request);
}
}
