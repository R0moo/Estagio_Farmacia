<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckNivel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$niveis)
    {
        if (!auth()->check()) {
        return redirect('login');
    }

    $user = auth()->user();
    
    foreach ($niveis as $nivel) {
        if ($user->hasNivel($nivel)) {
            return $next($request);
        }
    }

    abort(403, 'Acesso não autorizado');
        return $next($request);
    }
}
