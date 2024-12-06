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

        // Verificar si el token está en la sesión y depurarlo
        if (!$token) {
            // Si no hay token, mostrar mensaje de error y evitar el bucle de redirección
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        try {
            // Hacer la solicitud para obtener los datos del usuario
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Depurar la respuesta de la API
            if ($response->successful()) {
                // Si la respuesta es exitosa, mostrar los datos del usuario
                $userData = $response->json();
                return view('perfilUser.index', ['user' => $userData]);
            } else {
                // Si la API devuelve error (token inválido, etc.)
                return response()->json(['error' => 'Respuesta fallida de la API.'], 401);
            }
        } catch (\Exception $e) {
            // Manejar cualquier error inesperado
            return response()->json(['error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage()], 500);
        }
    }
}
