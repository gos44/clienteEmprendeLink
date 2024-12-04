<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class inicio_de_sesion_usuariocontroller extends Controller
{
    public function index()
    {
        return view('Views_Sebas.iniciar_sesion_usuario');
    }

    public function login(Request $request)
    {
        // Validar los datos de entrada con mensajes personalizados
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:entrepreneur,investor'
        ], [
            'email.required' => 'Por favor, ingrese su correo electrónico.',
            'email.email' => 'El correo electrónico no es válido.',
            'password.required' => 'Por favor, ingrese su contraseña.',
            'role.required' => 'Debe seleccionar un rol',
            'role.in' => 'El rol seleccionado no es válido'
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

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                $userData = $response->json();
    
                // Guardar el token y el rol del usuario en la sesión
                session(['auth_token' => $userData['token']]);
                session(['user_role' => $validated['role']]);
    
                // Redirigir según el rol
                return match($validated['role']) {
                    'entrepreneur' => Redirect::route('HomeUsuario.index')
                        ->with('success', 'Bienvenido, emprendedor.'),
                    'investor' => Redirect::route('HomeInversor.index')
                        ->with('success', 'Bienvenido, inversor.'),
                    default => back()->withErrors(['error' => 'Rol no reconocido'])
                };
            }

            // Si el login no es exitoso
            return back()->withErrors([
                'error' => 'Credenciales incorrectas. Por favor, revisa tus datos.'
            ])->withInput($request->only('email'));
            
        } catch (\Exception $e) {
            // Registro de errores
            Log::error('Error de inicio de sesión', [
                'message' => $e->getMessage(),
                'email' => $request->email,
                'role' => $request->role
            ]);

            return back()->withErrors([
                'error' => 'Ocurrió un error inesperado. Por favor, intenta de nuevo.'
            ]);
        }
    }
}