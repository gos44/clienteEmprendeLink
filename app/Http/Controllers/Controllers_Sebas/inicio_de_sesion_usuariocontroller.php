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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Enviar solicitud POST para obtener el token
            $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            if ($response->successful()) {
                $data = $response->json();
                $token = $data['access_token'];

                // Verificar que el token no esté vacío
                if (empty($token)) {
                    return response()->json([
                        'error' => 'Token de acceso no recibido o es inválido.',
                    ], 400);
                }

                // Intentar obtener la información del usuario
                $userInfoResponse = Http::withToken('Bearer ' . $token)
                                        ->accept('application/json')  // Asegúrate de que se acepte JSON
                                        ->get('https://apiemprendelink-production-9272.up.railway.app/api/user');

                // Log de la respuesta para depuración
                \Log::info('Respuesta de la API para obtener el usuario: ' . $userInfoResponse->body());

                // Si la respuesta es exitosa
                if ($userInfoResponse->successful()) {
                    $userData = $userInfoResponse->json();

                    // Almacenar la información del usuario en la sesión
                    session(['user' => $userData]);

                    // Redirigir según el rol
                    if ($userData['role'] === 'entrepreneur') {
                        return redirect()->route('Home_Usuario.index');
                    } elseif ($userData['role'] === 'investor') {
                        return redirect()->route('Home_inversor.index');
                    }

                    return response()->json([
                        'error' => 'Rol de usuario no definido',
                    ], 400);
                } else {
                    \Log::error('Error al obtener información de usuario: ' . $userInfoResponse->status());
                    return response()->json([
                        'error' => 'No se pudo obtener información de usuario',
                        'status_code' => $userInfoResponse->status(),
                    ], 401);
                }
            } else {
                return response()->json([
                    'error' => 'Credenciales incorrectas',
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error inesperado: ' . $e->getMessage(),
            ], 500);
        }
    }
}
