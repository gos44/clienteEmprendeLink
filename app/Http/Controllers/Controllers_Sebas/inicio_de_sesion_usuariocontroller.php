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
            $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            if ($response->successful()) {
                $data = $response->json();
                $token = $data['access_token'];

                // Verificar si el token está presente
                if (empty($token)) {
                    return response()->json([
                        'error' => 'Token de acceso no recibido o es inválido.',
                    ], 400);
                }

                // Usar el token para obtener la información del usuario
                $userInfoResponse = Http::withToken($token)
                                        ->get('https://apiemprendelink-production-9272.up.railway.app/api/user');

                // Si la respuesta de la API es exitosa
                if ($userInfoResponse->successful()) {
                    $userData = $userInfoResponse->json();

                    // Almacenar la información del usuario en la sesión
                    Session::put('user', $userData);

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
                    return response()->json([
                        'error' => 'No se pudo obtener información de usuario',
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
