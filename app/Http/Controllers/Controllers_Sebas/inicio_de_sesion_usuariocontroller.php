<?php
namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
                $data = $response->json();
                
                // Guardar el token en la sesión
                Session::put('api_token', $data['access_token']);
                Session::put('user_role', $validated['role']);

                $role = $validated['role'];

                if ($role == 'entrepreneur') {
                    return redirect()->route('Home_Usuario.index')
                        ->with('success', 'Inicio de sesión exitoso');
                } elseif ($role == 'investor') {
                    return redirect()->route('Home_inversor.index')
                        ->with('success', 'Inicio de sesión exitoso');
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
        // Enviar solicitud de logout a la API
        Http::withToken(Session::get('api_token'))
            ->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/logout');

        // Limpiar la sesión
        Session::flush();

        return redirect()->route('login')->with('success', 'Has cerrado sesión exitosamente');
    }
}