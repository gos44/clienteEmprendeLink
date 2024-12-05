<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

            if ($response->successful()) {
                // Obtener los datos de respuesta
                $responseData = $response->json();

                // Verificar si hay un token en la respuesta
                if (isset($responseData['token'])) {
                    // Guardar el token en la sesión
                    $request->session()->put('token', $responseData['token']);

                    // Verificar si el rol es entrepreneur o investor y redirigir a la vista correspondiente
                    $role = $validated['role'];

                    if ($role == 'entrepreneur') {
                        // Redirigir al perfil de usuario
                        return redirect()->route('perfilUser.index')
                            ->with('success', 'Inicio de sesión exitoso');
                    } elseif ($role == 'investor') {
                        // Redirigir al home de investor
                        return redirect()->route('Home_inversor.index')
                            ->with('success', 'Inicio de sesión exitoso');
                    }
                }
            }

            // Si el login no es exitoso
            return back()->withErrors([
                'error' => 'Credenciales incorrectas. Por favor, revisa tus datos.'
            ]);

        } catch (\Exception $e) {
            // Manejo de errores
            Log::error('Error de inicio de sesión', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->withErrors([
                'error' => 'Ocurrió un error inesperado. Por favor, intenta de nuevo.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        // Eliminar el token de la sesión
        $request->session()->forget('token');

        // Cerrar sesión
        Auth::logout();

        // Redirigir a la página de inicio de sesión
        return redirect()->route('iniciar_sesion_usuario.login')->with('success', 'Sesión cerrada exitosamente');
    }
}
