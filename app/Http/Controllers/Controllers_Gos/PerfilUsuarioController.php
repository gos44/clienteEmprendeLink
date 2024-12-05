<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Intenta obtener el token de diferentes fuentes
        $token = $request->session()->get('token')
                 ?? $request->cookie('token')
                 ?? $request->bearerToken()
                 ?? ($request->user() ? $request->user()->token : null);

        if (!$token) {
            // Si no hay token, redirigir al login con un mensaje de error
            return redirect()->route('login')->withErrors('No tienes acceso. Por favor, inicia sesión primero.');
        }

        try {
            // Hacer la solicitud a la API con el token en los encabezados
            $response = Http::withToken($token)->post('https://clienteemprendelink-production.up.railway.app/api/auth/me');

            if ($response->successful()) {
                // Decodificar la respuesta JSON
                $userData = $response->json();

                // Renderizar la vista con los datos obtenidos
                return view('Views_gos.PerfilUsuario', [
                    'user' => $userData,
                    'error' => null,
                ]);
            } else {
                // Si la respuesta falla, manejar el error
                return redirect()->route('login')->withErrors('No se pudo autenticar. Por favor, inicia sesión nuevamente.');
            }
        } catch (\Exception $e) {
            // Manejo de excepciones (como problemas de conexión)
            return redirect()->route('login')->withErrors('Error de conexión: ' . $e->getMessage());
        }
    }
}
