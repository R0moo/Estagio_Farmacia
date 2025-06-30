<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCourseAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        $curso = $request->route('curso');
        
        if (!$curso) {
            abort(404, 'Curso não encontrado');
        }

        // Acesso liberado para admins e moderadores
        if ($user->isAdmin() || $user->isModerator()) {
            return $next($request);
        }

        // Verifica para estudantes
        if ($user->isStudent()) {
if ($user->estudante && $user->estudante->curso_id == $curso->id) {
    return $next($request);
}
        }

        // Redireciona outros casos para a modal
        return redirect()->route('cursos.modal', $curso);
    }
}