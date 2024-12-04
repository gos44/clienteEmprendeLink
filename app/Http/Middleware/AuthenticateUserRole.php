<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class AuthenticateUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Verificar si hay un token en la sesión
        $token = session('auth_token');

        // Si no hay token, redirigir al login
        if (!$token) {
            return Redirect::route('iniciar_sesion_usuario.index')
                ->withErrors(['error' => 'Debes iniciar sesión primero.']);
        }

        // Verificar el token con la API
        try {
            $response = Http::withToken($token)
                ->get('https://apiemprendelink-production-9272.up.railway.app/api/auth/verify-token');

            // Si la verificación es exitosa
            if ($response->successful()) {
                $userData = $response->json();

                // Verificar si el rol coincide
                if ($userData['role'] === $role) {
                    return $next($request);
                }
            }
        } catch (\Exception $e) {
            // Manejar cualquier error de conexión
        }

        // Si algo falla, redirigir al login
        return Redirect::route('iniciar_sesion_usuario.index')
            ->withErrors(['error' => 'Acceso no autorizado.']);
    }
}
