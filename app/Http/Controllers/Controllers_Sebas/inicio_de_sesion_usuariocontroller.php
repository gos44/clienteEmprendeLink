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
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

            if ($response->successful()) {
                // Extraer el token del cuerpo de la respuesta
                $data = $response->json();
                $accessToken = $data['access_token'];

                // Guardar el token en la sesión
                session(['token' => $accessToken]);

                // Redirigir al home con un mensaje de éxito
                return redirect()->route('Home1')->with('success', 'Inicio de sesión exitoso.');
            } else {
                // Manejar errores de la API
                return back()->withErrors($response->json()['error'] ?? 'Credenciales incorrectas.')->withInput();
            }
        } catch (\Exception $e) {
            // Manejar excepciones generales
            return back()->withErrors(['error' => 'Error al comunicarse con la API. ' . $e->getMessage()])->withInput();
        }
    }
}
