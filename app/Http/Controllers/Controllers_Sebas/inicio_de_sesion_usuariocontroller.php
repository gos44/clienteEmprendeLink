<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            // Enviar solicitud POST a la API para autenticar
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            // Verificar la respuesta de autenticación
            if ($response->successful()) {
                // Extraer datos del token
                $data = $response->json();
                $token = $data['access_token'];

                // Intentar obtener información del usuario
                $userInfoResponse = Http::withToken($token)
                    ->withHeaders([
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token
                    ])
                    ->get('https://apiemprendelink-production-9272.up.railway.app/api/user');

                // Registro de depuración
                Log::info('Token de acceso:', ['token' => $token]);
                Log::info('Respuesta de información de usuario:', [
                    'status' => $userInfoResponse->status(),
                    'body' => $userInfoResponse->body()
                ]);

                // Verificar la respuesta de información de usuario
                if ($userInfoResponse->successful()) {
                    $userData = $userInfoResponse->json();

                    // Verificar el rol del usuario
                    if (isset($userData['role'])) {
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
                    }

                    // Si no se encuentra un rol definido
                    return response()->json([
                        'error' => 'Rol de usuario no definido',
                        'user_data' => $userData
                    ], 400);
                } else {
                    // Error al obtener información de usuario
                    return response()->json([
                        'error' => 'No se pudo obtener información de usuario',
                        'status_code' => $userInfoResponse->status(),
                        'response_body' => $userInfoResponse->body(),
                        'token' => $token
                    ], 401);
                }
            } else {
                // Error en la autenticación inicial
                return response()->json([
                    'error' => $response->json()['error'] ?? 'Credenciales incorrectas',
                    'status_code' => $response->status(),
                    'response_body' => $response->body()
                ], 401);
            }
        } catch (\Exception $e) {
            // Manejar cualquier excepción
            return response()->json([
                'error' => 'Error inesperado: ' . $e->getMessage()
            ], 500);
        }
    }
}
