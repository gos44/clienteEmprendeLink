<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el token de la sesión
        $token = session('token');
        dd(session()->all());

        // Verifica si el token está disponible
        if (!$token) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        try {
            // Realiza la solicitud a la API usando el token
            $response = Http::withToken($token)
                ->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Verifica el estado de la respuesta
            if ($response->successful()) {
                // Extraer datos del usuario
                $userData = $response->json()['user_data'];

                // Enviar los datos a la vista
                return view('perfilUser.index', ['user' => $userData]);
            }

            // Si la API devuelve un error (no autorizado, sesión expirada, etc.)
            if ($response->status() === 401) {
                return redirect()->route('login')->with('error', 'Sesión expirada o no autorizada.');
            }

            // Manejar otros estados de error
            return redirect()->route('login')->with('error', 'Error inesperado al obtener datos del perfil.');
        } catch (\Exception $e) {
            // En caso de error en la solicitud
            return redirect()->route('login')->with('error', 'Error al conectar con el servidor.');
        }
    }
}
