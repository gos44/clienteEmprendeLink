<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el token desde la sesión
        $token = session('token', null);

        if (!$token) {
            // Si no hay token, evitar el bucle de redirección y mostrar un mensaje simple
            return response()->view('login', [], 401);
        }

        try {
            // Hacer la solicitud para obtener los datos del usuario
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            if ($response->successful()) {
                // Extraer datos del usuario y enviarlos a la vista
                $userData = $response->json();
                return view('perfilUser.index', ['user' => $userData]);
            } else {
                // Si la API devuelve error (token inválido, etc.)
                return response()->view('errors.session_expired', [], 401);
            }
        } catch (\Exception $e) {
            // Manejar cualquier error inesperado
            return response()->view('errors.generic_error', ['message' => $e->getMessage()], 500);
        }
    }
}
