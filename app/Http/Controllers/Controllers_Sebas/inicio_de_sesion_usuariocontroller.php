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
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required|in:entrepreneur,investor'
    ]);

    try {
        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password']
        ];

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

        if ($response->successful()) {
            $userData = $response->json(); // Suponiendo que obtienes los datos del usuario desde la API

            // Autenticar al usuario en Laravel
            Auth::loginUsingId($userData['id']); // Ajustar según el formato de respuesta de la API

            $role = $validated['role'];
            if ($role == 'entrepreneur') {
                return redirect()->route('Home_Usuario.index')
                    ->with('success', 'Inicio de sesión exitoso.');
            } elseif ($role == 'investor') {
                return redirect()->route('Home_inversor.index')
                    ->with('success', 'Inicio de sesión exitoso.');
            }
        }

        return back()->withErrors([
            'error' => 'Credenciales incorrectas.'
        ]);

    } catch (\Exception $e) {
        Log::error('Error de inicio de sesión', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return back()->withErrors([
            'error' => 'Ocurrió un error inesperado.'
        ]);
    }
}

}
