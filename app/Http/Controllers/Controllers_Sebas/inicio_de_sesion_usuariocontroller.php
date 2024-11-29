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
        // Valida los datos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            // Enviar solicitud POST a la API
            $response = Http::post('http://127.0.0.1:8000/api/auth/login', $credentials);

            // Inspecciona la respuesta de la API
            if ($response->successful()) {
                return redirect()->route('Home_Usuario.index')
                    ->with('success', 'Usuario registrado con éxito. Ahora puedes iniciar sesión.');
            } else {
                // Si hubo un error con la API, muestra los errores
                return back()->withErrors($response->json()['errors'] ?? ['Error al registrar el usuario.'])
                    ->withInput();
            }

            // Si todo va bien, redirige o procesa el token
            if ($response->successful()) {
                $data = $response->json();
                session(['token' => $data['access_token']]); // Guarda el token en la sesión (opcional)
                return redirect()->route('home')->with('success', 'Inicio de sesión exitoso.');
            } else {
                return back()->withErrors($response->json()['error'] ?? 'Error desconocido.')
                    ->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al comunicarse con la API. ' . $e->getMessage()])
                ->withInput();
        }
    }
}
