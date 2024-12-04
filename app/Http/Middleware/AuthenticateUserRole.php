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
        // Obtener el token de la sesión
        $token = session('auth_token');
        $userRole = session('user_role');

        // Si no hay token, redirigir al login
        if (!$token || !$userRole) {
            return Redirect::route('iniciar_sesion_usuario.index')
                ->withErrors(['error' => 'Debes iniciar sesión primero.']);
        }

        // Verificar si el rol coincide
        if ($userRole !== $role) {
            return Redirect::route('iniciar_sesion_usuario.index')
                ->withErrors(['error' => 'Acceso no autorizado.']);
        }

        // Verificar el token con la API (opcional, dependiendo de tu backend)
        try {
            $response = Http::withToken($token)
                ->get('https://apiemprendelink-production-9272.up.railway.app/api/auth/verify-token');

            if (!$response->successful()) {
                return Redirect::route('iniciar_sesion_usuario.index')
                    ->withErrors(['error' => 'Sesión expirada.']);
            }
        } catch (\Exception $e) {
            return Redirect::route('iniciar_sesion_usuario.index')
                ->withErrors(['error' => 'Error de conexión.']);
        }

        return $next($request);
    }
}
