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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Enviar solicitud POST a la API para autenticar al usuario
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', [
                'email' => $credentials['email'],
                'password' => $credentials['password']
            ]);

            // Verificar si la autenticación fue exitosa
            if ($response->successful()) {
                // Obtener el token de acceso de manera segura
                $data = $response->json();
                $token = $data['access_token'] ?? null;

                // Verificar si el token está presente y válido
                if (empty($token)) {
                    return response()->json([
                        'error' => 'Token de acceso no recibido o es inválido.',
                    ], 400);
                }

                // Intentar obtener la información del usuario con el token
                $userInfoResponse = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json'
                ])->get('https://apiemprendelink-production-9272.up.railway.app/api/user');

                // Registro de depuración para la respuesta del usuario
                Log::info('Detalles de autenticación', [
                    'token' => $token,
                    'user_info_status' => $userInfoResponse->status(),
                    'user_info_body' => $userInfoResponse->body()
                ]);

                // Verificar si la respuesta para la información del usuario es exitosa
                if ($userInfoResponse->successful()) {
                    $userData = $userInfoResponse->json();

                    // Buscar el usuario en la base de datos local
                    $user = User::where('email', $userData['email'])->first();

                    if ($user) {
                        // Iniciar sesión en Laravel
                        Auth::login($user);

                        // Verificar el rol del usuario
                        if ($user->entrepreneur) {
                            // Si el rol es 'entrepreneur', redirigir a la vista correspondiente
                            return redirect()->route('Home_Usuario.index');
                        } elseif ($user->investor) {
                            // Si el rol es 'investor', redirigir a la vista correspondiente
                            return redirect()->route('Home_inversor.index');
                        }
                    }

                    // Si el usuario no tiene un rol válido
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
            Log::error('Error de inicio de sesión', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Error inesperado: ' . $e->getMessage()
            ], 500);
        }
    }
}
