<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para autenticación si es necesario

class inicio_de_sesion_usuariocontroller extends Controller
{
    public function index()
    {
        return view('Views_Sebas.iniciar_sesion_usuario');
    }

    public function login(Request $request)
    {
        // Validar datos de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Enviar solicitud POST a la API para obtener el token
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            // Verificar si la respuesta fue exitosa
            if ($response->successful()) {
                // Extraer datos de la respuesta
                $data = $response->json();
                $token = $data['access_token'];

                // Consultar el usuario en la base de datos
                $user = \App\Models\User::where('email', $credentials['email'])->first();

                // Verificar si el usuario existe
                if (!$user) {
                    return back()->withErrors(['error' => 'Usuario no encontrado en la base de datos.'])->withInput();
                }

                // Obtener el rol del usuario (debes asegurarte de tener el campo 'role' en la tabla 'users')
                $role = $user->role; // Asume que tienes un campo 'role' en la tabla 'users'

                // Guardar el token en la sesión (opcional)
                session(['token' => $token]);

                // Redirigir según el rol
                if ($role === 'entrepreneur') {
                    // Redirige al home del entrepreneur
                    return redirect()->route('Home_Usuario.index')->with('success', 'Inicio de sesión exitoso.');
                } elseif ($role === 'investor') {
                    // Redirige al home del investor
                    return redirect()->route('Home_inversor.index')->with('success', 'Inicio de sesión exitoso.');
                } else {
                    // Manejar rol no válido
                    return back()->withErrors(['error' => 'Rol no válido.'])->withInput();
                }
            } else {
                // Manejar errores de la API, como credenciales incorrectas
                return back()->withErrors(['error' => $response->json()['error'] ?? 'Credenciales incorrectas.'])->withInput();
            }
        } catch (\Exception $e) {
            // Manejar excepciones en la comunicación con la API
            return back()->withErrors(['error' => 'Error al comunicarse con la API: ' . $e->getMessage()])->withInput();
        }
    }
}
