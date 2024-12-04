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
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:entrepreneur,investor'
        ]);

        try {
            // Preparar los datos para la autenticación
            $credentials = [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => $validated['role']
            ];

            // Enviar la solicitud POST a la API para autenticar al usuario
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                $data = $response->json();

                // Verificar que la API haya devuelto un token
                if (isset($data['token'])) {
                    // Guardar el token en la sesión
                    session(['auth_token' => $data['token']]);

                    // Redirigir según el rol
                    if ($validated['role'] == 'entrepreneur') {
                        return redirect()->route('Home_Usuario.index')
                            ->with('success', 'Inicio de sesión exitoso.');
                    } elseif ($validated['role'] == 'investor') {
                        return redirect()->route('Home_inversor.index')
                            ->with('success', 'Inicio de sesión exitoso.');
                    }
                } else {
                    // Si no se recibe un token
                    return back()->withErrors(['error' => 'No se recibió un token válido.']);
                }
            } else {
                // Si la respuesta de la API no fue exitosa
                return back()->withErrors(['error' => 'Credenciales incorrectas. Por favor, revisa tus datos.']);
            }
        } catch (\Exception $e) {
            // Manejo de errores
            Log::error('Error de inicio de sesión', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->withErrors(['error' => 'Ocurrió un error inesperado. Por favor, intenta de nuevo.']);
        }
    }
}
