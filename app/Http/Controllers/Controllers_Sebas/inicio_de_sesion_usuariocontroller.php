<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User; // Asegúrate de importar el modelo User

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

                // Modificar la solicitud de información de usuario
                $userInfoResponse = Http::withToken($token)
                    ->get('https://apiemprendelink-production-9272.up.railway.app/api/user');

                // Registro de depuración detallado
                Log::info('Solicitud de información de usuario:', [
                    'token' => $token,
                    'endpoint' => 'https://apiemprendelink-production-9272.up.railway.app/api/user'
                ]);

                // Verificar si la respuesta para la información del usuario es exitosa
                if ($userInfoResponse->successful()) {
                    $userData = $userInfoResponse->json();

                    // Buscar el usuario en la base de datos local
                    $user = User::where('email', $userData['email'])->first();

                    if ($user) {
                        // Verificar el rol del usuario
                        if ($user->entrepreneur) {
                            return redirect()->route('Home_Usuario.index');
                        } elseif ($user->investor) {
                            return redirect()->route('Home_inversor.index');
                        }
                    }

                    return response()->json([
                        'error' => 'Rol de usuario no definido',
                        'user_data' => $userData
                    ], 400);
                } else {
                    // Depuración detallada si falla la obtención de información
                    Log::error('Error al obtener información de usuario:', [
                        'status' => $userInfoResponse->status(),
                        'body' => $userInfoResponse->body(),
                        'headers' => $userInfoResponse->headers()
                    ]);

                    return response()->json([
                        'error' => 'No se pudo obtener información de usuario',
                        'status_code' => $userInfoResponse->status(),
                        'response_body' => $userInfoResponse->body(),
                    ], 401);
                }
            } else {
                return response()->json([
                    'error' => $response->json()['error'] ?? 'Credenciales incorrectas',
                    'status_code' => $response->status(),
                ], 401);
            }
        } catch (\Exception $e) {
            // Registro detallado de errores inesperados
            Log::error('Error inesperado:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Error inesperado: ' . $e->getMessage()
            ], 500);
        }
    }
}
