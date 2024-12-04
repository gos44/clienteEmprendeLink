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
        return view('Views_Sebas.iniciar_sesion_usuario');
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
                // Obtener el token desde la respuesta
                $responseData = $response->json();

                if (isset($responseData['access_token'])) {
                    // Retornar el token y otros datos en formato JSON
                    return response()->json([
                        'success' => true,
                        'message' => 'Token generado correctamente',
                        'token' => $responseData['access_token'],
                        'token_type' => $responseData['token_type'],
                        'role' => $validated['role']
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'No se recibió el token en la respuesta',
                        'response' => $responseData
                    ]);
                }
            }

            // Si la respuesta no es exitosa
            return response()->json([
                'success' => false,
                'message' => 'Credenciales incorrectas o problema con la autenticación',
                'response' => $response->json()
            ]);

        } catch (\Exception $e) {
            // Manejo de errores
            Log::error('Error de inicio de sesión', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado. Por favor, intenta de nuevo.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
