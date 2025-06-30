<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Curso;
use Carbon\Carbon;

class CursoFinalizado
{
    public function handle(Request $request, Closure $next)
    {
        $curso = $request->route('curso');

        if (is_numeric($curso)) {
            $curso = Curso::findOrFail($curso);
        }

        if ($curso->data_fim > Carbon::today()) {
            return abort(403, 'O curso ainda não foi finalizado.');
        }

        return $next($request);
    }
}

