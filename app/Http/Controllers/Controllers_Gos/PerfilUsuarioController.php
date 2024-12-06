<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Obtener token de sesión y limpiarlo
        $token = session('token') ? trim(session('token')) : null;

        // Si no hay token, redirigir a login
        if (!$token) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        try {
            // Intentar obtener los datos del usuario con el token
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Si la respuesta es exitosa, mostrar perfil
            if ($response->successful()) {
                $userData = $response->json(); // Obtén todos los datos del usuario
                return view('perfilUser.index', ['user' => $userData]);
            }

            // Si falla, redirigir a login
            return redirect()->route('login')->with('error', 'Sesión expirada');

        } catch (\Exception $e) {
            // En caso de error, redirigir a login
            return redirect()->route('login')->with('error', 'Error al validar sesión');
        }
    }
}
