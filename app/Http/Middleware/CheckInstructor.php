<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user()->load('instrutor');
    
        if (!$user || (!$user->instrutor && ! $user->is_admin)) {
            // Redirecionar para uma página de erro ou para a página inicial
            return redirect('/dashboard');
        }
        
        return $next($request);
    }

}
