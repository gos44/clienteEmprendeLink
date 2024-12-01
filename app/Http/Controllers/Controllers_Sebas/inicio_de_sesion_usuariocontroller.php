<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http; // <-- Asegúrate de incluir esta línea

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class inicio_de_sesion_usuariocontroller extends Controller
{
    public function index()
    {
        return view('Views_Sebas.iniciar_sesion_usuario');
    }

    public function login(Request $request)
    {
        // Validar datos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Enviar solicitud POST a la API
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            if ($response->successful()) {
                // Extraer token del cuerpo de la respuesta
                $data = $response->json();

                // Retornar el token como JSON
                return response()->json([
                    'access_token' => $data['access_token'],
                    'token_type' => $data['token_type'] ?? 'bearer',
                ], 200);
            } else {
                // Manejar errores de la API
                return response()->json([
                    'error' => $response->json()['error'] ?? 'Credenciales incorrectas.',
                ], 401);
            }
        } catch (\Exception $e) {
            // Manejar excepciones generales
            return response()->json([
                'error' => 'Error al comunicarse con la API: ' . $e->getMessage(),
            ], 500);
        }
    }
}
