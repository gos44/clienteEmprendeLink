<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
                // Obtener el token de la respuesta JSON
                $data = $response->json();
                $token = $data['access_token'] ?? null;

                if (!$token) {
                    return response()->json(['error' => 'Token no encontrado'], 400);
                }

                // Retornar el token como respuesta JSON
                return response()->json([
                    'message' => 'Inicio de sesión exitoso',
                    'access_token' => $token,
                    'token_type' => 'bearer',
                ], 200);
            }

            // Si el login no es exitoso
            return back()->withErrors([
                'error' => 'Credenciales incorrectas. Por favor, revisa tus datos.'
            ]);

        } catch (\Exception $e) {
            // Manejo de errores
            Log::error('Error de inicio de sesión', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->withErrors([
                'error' => 'Ocurrió un error inesperado. Por favor, intenta de nuevo.'
            ]);
        }
    }
}
