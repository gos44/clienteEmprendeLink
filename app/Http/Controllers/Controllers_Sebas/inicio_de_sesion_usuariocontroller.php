<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class inicio_de_sesion_usuariocontroller extends Controller
{
    public function index()
    {
        return view('Views_Sebas.iniciar_sesion_usuario');
    }

    public function login(Request $request)
    {
        // Validar datos de entrada
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:entrepreneur,investor'
        ]);

        try {
            // Enviar solicitud a la API de autenticación
            $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => $validated['role']
            ]);

            // Comprobamos si la respuesta fue exitosa
            if ($response->ok()) {
                $data = $response->json();

                // Verificar que el token esté presente
                if (isset($data['token'])) {
                    session(['auth_token' => $data['token']]);
                    return response()->json(['token' => $data['token']], 200);  // Retorna el token
                } else {
                    return response()->json(['message' => 'Token no recibido'], 400);
                }
            } else {
                return response()->json(['message' => 'Credenciales incorrectas'], 401);
            }
        } catch (\Exception $e) {
            Log::error('Error de inicio de sesión: '.$e->getMessage());
            return response()->json(['message' => 'Error inesperado. Inténtalo de nuevo.'], 500);
        }
    }
}
