<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class inicio_de_sesion_usuariocontroller extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Endpoint para iniciar sesión'], 200);
    }

    public function login(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:entrepreneur,investor'
        ]);

        try {
            // Preparar datos para la autenticación
            $credentials = [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => $validated['role']
            ];

            // Enviar solicitud POST a la API para autenticar al usuario
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            if ($response->successful()) {
                // Obtener el token JWT de la respuesta
                $token = $response->json()['access_token']; // Asumiendo que la respuesta tiene "access_token"

                // Responder con el token y datos adicionales
                return response()->json([
                    'message' => 'Inicio de sesión exitoso',
                    'access_token' => $token,
                    'role' => $validated['role']
                ], 200);
            }

            // Si el login no es exitoso
            return response()->json([
                'error' => 'Credenciales incorrectas. Por favor, revisa tus datos.'
            ], 401);

        } catch (\Exception $e) {
            // Manejo de errores
            Log::error('Error de inicio de sesión', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Ocurrió un error inesperado. Por favor, intenta de nuevo.'
            ], 500);
        }
    }
}

