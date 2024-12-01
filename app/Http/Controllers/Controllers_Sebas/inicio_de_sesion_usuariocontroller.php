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
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:entrepreneur,investor' // Añadir validación de rol
        ]);

        try {
            // Preparar datos para la autenticación
            $credentials = [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => $validated['role'] // Incluir rol en las credenciales
            ];

            // Enviar solicitud POST a la API para autenticar al usuario
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            // Verificar si la autenticación fue exitosa
            if ($response->successful()) {
                $data = $response->json();

                // Buscar el usuario en la base de datos local
                $user = User::where('email', $validated['email'])->first();

                if ($user) {
                    // Verificar el rol seleccionado
                    if (
                        ($validated['role'] === 'entrepreneur' && $user->entrepreneur) ||
                        ($validated['role'] === 'investor' && $user->investor)
                    ) {
                        // Iniciar sesión en Laravel
                        Auth::login($user);

                        // Redirigir según el rol
                        if ($validated['role'] === 'entrepreneur') {
                            return redirect()->route('Home_Usuario.index');
                        } else {
                            return redirect()->route('Home_inversor.index');
                        }
                    } else {
                        // El usuario no tiene el rol seleccionado
                        return back()->withErrors([
                            'role' => 'No tienes permisos para iniciar sesión con este rol.'
                        ]);
                    }
                } else {
                    // Usuario no encontrado en la base de datos local
                    return back()->withErrors([
                        'email' => 'Usuario no encontrado.'
                    ]);
                }
            } else {
                // Error de autenticación
                return back()->withErrors([
                    'email' => $response->json()['message'] ?? 'Credenciales incorrectas'
                ]);
            }
        } catch (\Exception $e) {
            // Manejar errores inesperados
            Log::error('Error de inicio de sesión', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->withErrors([
                'error' => 'Ocurrió un error inesperado. Por favor, intenta de nuevo.'
            ]);
        }
    }
}
