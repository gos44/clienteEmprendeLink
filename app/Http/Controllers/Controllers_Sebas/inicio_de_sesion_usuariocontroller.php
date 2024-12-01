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
            'role' => 'required|in:entrepreneur,investor'
        ]);

        try {
            // Preparar datos para la autenticación
            $credentials = [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => $validated['role']
            ];

            // Enviar solicitud POST a la API para autenticar al usuario
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            // Log para depuración
            Log::info('Respuesta de autenticación', [
                'status' => $response->status(),
                'body' => $response->body(),
                'validated' => $validated
            ]);

            // Verificar si la autenticación fue exitosa
            if ($response->successful()) {
                $data = $response->json();

                // Buscar el usuario en la base de datos local
                $user = User::where('email', $validated['email'])->first();

                if ($user) {
                    // Log para verificar los campos del usuario
                    Log::info('Datos del usuario', [
                        'user' => $user,
                        'role' => $validated['role']
                    ]);

                    // Modificar la verificación de rol
                    $roleVerified = false;
                    if ($validated['role'] === 'entrepreneur' && $user->entrepreneur) {
                        $roleVerified = true;
                    } elseif ($validated['role'] === 'investor' && $user->investor) {
                        $roleVerified = true;
                    }

                    if ($roleVerified) {
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
                        Log::warning('Intento de inicio de sesión con rol no autorizado', [
                            'email' => $validated['email'],
                            'role' => $validated['role'],
                            'user_entrepreneur' => $user->entrepreneur ?? 'No definido',
                            'user_investor' => $user->investor ?? 'No definido'
                        ]);

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
