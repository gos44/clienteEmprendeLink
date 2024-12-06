<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Obtener token de sesión
        $token = session('token') ? trim(session('token')) : null;

        // Si no hay token, redirigir al login
        if (!$token) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        try {
            // Hacer la solicitud a la API para obtener los datos del usuario
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Si la respuesta es exitosa, obtener los datos del usuario
            if ($response->successful()) {
                $userData = $response->json();
                return view('perfilUser.index', ['user' => $userData]); // Pasa los datos a la vista
            }

            // Si falla, redirigir al login
            return redirect()->route('login')->with('error', 'Sesión expirada o inválida.');

        } catch (\Exception $e) {
            // Manejar errores
            return redirect()->route('login')->with('error', 'Error al validar sesión: ' . $e->getMessage());
        }
    }
}
