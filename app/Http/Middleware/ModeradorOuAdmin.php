<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModeradorOuAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user && ($user->isAdmin() || $user->isModerator())) {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado.');
    }
}

