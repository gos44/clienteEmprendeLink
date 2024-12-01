<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
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

        // Enviar solicitud POST a la API para autenticar
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

        if ($response->successful()) {
            // Extraer datos del token
            $data = $response->json();
            $token = $data['access_token'];

            // Hacer una solicitud para obtener la información del usuario
            $userInfoResponse = Http::withToken($token)->get('https://apiemprendelink-production-9272.up.railway.app/api/user');

            if ($userInfoResponse->successful()) {
                $userData = $userInfoResponse->json();

                // Verificar el rol del usuario
                if ($userData['role'] === 'entrepreneur') {
                    return response()->json([
                        'access_token' => $token,
                        'redirect' => route('Home_Usuario.index')
                    ], 200);
                } elseif ($userData['role'] === 'investor') {
                    return response()->json([
                        'access_token' => $token,
                        'redirect' => route('Home_inversor.index')
                    ], 200);
                }

                // Si no se encuentra un rol definido, devolver el token
                return response()->json([
                    'access_token' => $token,
                    'token_type' => $data['token_type'] ?? 'bearer',
                ], 200);
            } else {
                // Error al obtener información del usuario
                return response()->json([
                    'error' => 'No se pudo obtener la información del usuario',
                ], 400);
            }
        } else {
            // Manejar errores de la API
            return response()->json([
                'error' => $response->json()['error'] ?? 'Credenciales incorrectas.',
            ], 401);
        }
    }
}
