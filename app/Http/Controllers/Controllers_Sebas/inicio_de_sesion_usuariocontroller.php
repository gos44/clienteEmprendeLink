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
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            // Registro detallado de la respuesta de autenticación
            Log::info('Respuesta de autenticación', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            // Verificar si la autenticación fue exitosa
            if ($response->successful()) {
                // Obtener los datos de la respuesta
                $data = $response->json();

                // Verificar la existencia del token
                if (!isset($data['access_token'])) {
                    Log::error('No se encontró el token de acceso', ['response_data' => $data]);
                    return response()->json([
                        'error' => 'No se recibió el token de acceso',
                    ], 400);
                }

                $token = $data['access_token'];

                // Intentar obtener la información del usuario
                $userInfoResponse = Http::withToken($token)
                    ->get('https://apiemprendelink-production-9272.up.railway.app/api/user');

                // Registro detallado de la solicitud de información de usuario
                Log::info('Solicitud de información de usuario', [
                    'token' => $token,
                    'status' => $userInfoResponse->status(),
                    'body' => $userInfoResponse->body(),
                ]);

                // Verificar si se obtuvo la información del usuario
                if ($userInfoResponse->successful()) {
                    $userData = $userInfoResponse->json();

                    // Buscar el usuario en la base de datos local
                    $user = User::where('email', $userData['email'])->first();

                    if ($user) {
                        // Iniciar sesión en Laravel
                        Auth::login($user);

                        // Guardar el token en la sesión si es necesario
                        session(['api_token' => $token]);

                        // Verificar el rol del usuario
                        if ($user->entrepreneur) {
                            return redirect()->route('Home_Usuario.index');
                        } elseif ($user->investor) {
                            return redirect()->route('Home_inversor.index');
                        }
                    }

                    // Si el usuario no tiene un rol válido
                    return response()->json([
                        'error' => 'Rol de usuario no definido',
                        'user_data' => $userData
                    ], 400);
                } else {
                    // Detalles del error al obtener información de usuario
                    Log::error('Error al obtener información de usuario', [
                        'status' => $userInfoResponse->status(),
                        'body' => $userInfoResponse->body(),
                    ]);

                    return response()->json([
                        'error' => 'No se pudo obtener información de usuario',
                        'status_code' => $userInfoResponse->status(),
                        'response_body' => $userInfoResponse->body(),
                    ], 401);
                }
            } else {
                // Error en la autenticación inicial
                Log::error('Error de autenticación', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return response()->json([
                    'error' => $response->json()['message'] ?? 'Credenciales incorrectas',
                    'status_code' => $response->status(),
                ], 401);
            }
        } catch (\Exception $e) {
            // Manejar errores inesperados
            Log::error('Error inesperado en inicio de sesión', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Error inesperado: ' . $e->getMessage()
            ], 500);
        }
    }
}
