<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index()
    {
        $url = 'https://clienteemprendelink-production.up.railway.app/api/auth/me';

        // Obtener el token del usuario autenticado desde la sesión o modelo de usuario
        $token = session('api_token') ?? (Auth::user()->token ?? null);

        if (!$token) {
            // Si no hay token, redirigir al login con un mensaje de error
            return redirect()->route('login')->withErrors('No tienes acceso. Por favor, inicia sesión primero.');
        }

        try {
            // Hacer la solicitud a la API con el token en los encabezados
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$token}",
                'Content-Type' => 'application/json',
            ])->post($url);

            if ($response->successful()) {
                // Decodificar la respuesta JSON
                $data = $response->json();

                // Renderizar la vista con los datos obtenidos
                return view('Views_gos.PerfilUsuario', [
                    'connections' => $data,
                    'error' => null,
                ]);
            } else {
                // Si la respuesta falla, manejar el error
                $error = 'Error al cargar el perfil: Código ' . $response->status();
                return view('Views_gos.PerfilUsuario', [
                    'connections' => [],
                    'error' => $error,
                ]);
            }
        } catch (\Exception $e) {
            // Manejo de excepciones (como problemas de conexión)
            return view('Views_gos.PerfilUsuario', [
                'connections' => [],
                'error' => 'Error al conectar con el servidor. Detalles: ' . $e->getMessage(),
            ]);
        }
    }
}
