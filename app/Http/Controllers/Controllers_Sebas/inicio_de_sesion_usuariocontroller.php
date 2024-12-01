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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Enviar solicitud POST a la API para autenticar al usuario
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            // Verificar si la autenticación fue exitosa
            if ($response->successful()) {
                // Obtener el token de acceso
                $data = $response->json();
                $token = $data['access_token'];

                // Verificar si el token está presente y válido
                if (empty($token)) {
                    return response()->json([
                        'error' => 'Token de acceso no recibido o es inválido.',
                    ], 400);
                }

                // Intentar obtener la información del usuario con el token
                $userInfoResponse = Http::withHeaders([
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token
                    ])
                    ->get('https://apiemprendelink-production-9272.up.railway.app/api/users');  // Verificar que este sea el endpoint correcto

                // Registro de depuración para la respuesta del usuario
                Log::info('Token de acceso:', ['token' => $token]);
                Log::info('Respuesta de información de usuario:', [
                    'status' => $userInfoResponse->status(),
                    'body' => $userInfoResponse->body()
                ]);

                // Verificar si la respuesta para la información del usuario es exitosa
                if ($userInfoResponse->successful()) {
                    $userData = $userInfoResponse->json();

                    // Verificar si el usuario tiene un rol
                    if (isset($userData['role'])) {
                        // Redirigir según el rol del usuario
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

                    // Si no se encuentra un rol válido, enviar error
                    return response()->json([
                        'error' => 'Rol de usuario no definido',
                        'user_data' => $userData
                    ], 400);
                } else {
                    // Si no se pudo obtener la información del usuario
                    return response()->json([
                        'error' => 'No se pudo obtener información de usuario',
                        'status_code' => $userInfoResponse->status(),
                        'response_body' => $userInfoResponse->body(),
                        'token' => $token
                    ], 401);
                }
            } else {
                // Si la autenticación inicial falla
                return response()->json([
                    'error' => $response->json()['error'] ?? 'Credenciales incorrectas',
                    'status_code' => $response->status(),
                    'response_body' => $response->body()
                ], 401);
            }
        } catch (\Exception $e) {
            // Manejar cualquier error inesperado
            return response()->json([
                'error' => 'Error inesperado: ' . $e->getMessage()
            ], 500);
        }
    }
}
