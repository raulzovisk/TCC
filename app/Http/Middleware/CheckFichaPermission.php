<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Ficha;

class CheckFichaPermission
{
    public function handle(Request $request, Closure $next)
    {
        $fichaId = $request->route('id');
        
        // Recuperar a ficha com o relacionamento de aluno carregado
        $ficha = Ficha::with('aluno')->findOrFail($fichaId);

        // Verificar se o aluno logado tem acesso à ficha
        if ($ficha->aluno && $ficha->aluno->id_user === auth()->id()) {
            return $next($request);
        }

        return abort(403, 'Acesso negado');
    }
}
