<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilInverEditarController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el token desde la sesión
        $token = session('token', null);

        // Verificar si el token está en la sesión
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

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                // Si la respuesta es exitosa, obtener los datos del usuario
                $userData = $response->json();




                return view('Views_gos/EditarPerfilInversionista', ['user' => $userData]);
            } else {
                // Si la respuesta es fallida, devolver mensaje de error con código 401
                return response()->json(['error' => 'Respuesta fallida de la API.'], 401);
            }
        } catch (\Exception $e) {
            // Si ocurre un error inesperado, devolver mensaje de error con el detalle
            return response()->json(['error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage()], 500);
        }
    }
}
