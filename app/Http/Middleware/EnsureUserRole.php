<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Por favor, inicia sesión primero.');
        }

        // Check if the authenticated user has the correct role
        $user = Auth::user();
        
        // Assuming you have a way to determine the user's role
        // This might depend on how you've set up your User and related models
        if ($role === 'entrepreneur' && !$user->entrepreneur) {
            return redirect()->route('login')->with('error', 'No tienes permisos de emprendedor.');
        }

        if ($role === 'investor' && !$user->investor) {
            return redirect()->route('login')->with('error', 'No tienes permisos de inversionista.');
        }

        return $next($request);
    }
}