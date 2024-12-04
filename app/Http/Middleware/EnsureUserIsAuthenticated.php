<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class EnsureUserIsAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar si hay un token de acceso en la sesión
        $accessToken = session('access_token');

        if (!$accessToken) {
            // Si no hay token, redirigir al login
            return redirect()->route('iniciar_sesion_usuario.index')
                ->with('error', 'Debes iniciar sesión primero');
        }

        // Validar el token con la API
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Accept' => 'application/json',
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            if ($response->successful()) {
                // Token válido, continuar con la solicitud
                return $next($request);
            }
        } catch (\Exception $e) {
            // Error al validar el token
            session()->forget('access_token');
            return redirect()->route('iniciar_sesion_usuario.index')
                ->with('error', 'Su sesión ha expirado');
        }

        // Token inválido
        session()->forget('access_token');
        return redirect()->route('iniciar_sesion_usuario.index')
            ->with('error', 'Debes iniciar sesión primero');
    }
}