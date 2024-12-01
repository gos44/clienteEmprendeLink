<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http; // <-- Asegúrate de incluir esta línea

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class inicio_de_sesion_usuariocontroller extends Controller
{
    public function index()
    {
        return view('Views_Sebas.iniciar_sesion_usuario');
    }

    public function login(Request $request)
    {
        // Validar las credenciales
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Enviar solicitud POST a la API para autenticar
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            if ($response->successful()) {
                // Extraer los datos del usuario autenticado
                $data = $response->json();
                $user = \App\Models\User::where('email', $credentials['email'])->first();

                if (!$user) {
                    return back()->withErrors(['error' => 'Usuario no encontrado en la base de datos.'])->withInput();
                }

                // Obtener el rol del usuario
                $role = $user->role; // Asumiendo que hay un campo `role` en la tabla `users`

                // Guardar el token en la sesión (opcional)
                session(['token' => $data['access_token']]);

                // Redirigir según el rol
                if ($role === 'entrepreneur') {
                    return redirect()->route('Home_Usuario.index')->with('success', 'Inicio de sesión exitoso.');
                } elseif ($role === 'investor') {
                    return redirect()->route('Home_inversor.index')->with('success', 'Inicio de sesión exitoso.');
                } else {
                    return back()->withErrors(['error' => 'Rol no válido.'])->withInput();
                }
            } else {
                return back()->withErrors($response->json()['error'] ?? 'Credenciales incorrectas.')->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al comunicarse con la API: ' . $e->getMessage()])->withInput();
        }
    }
}
