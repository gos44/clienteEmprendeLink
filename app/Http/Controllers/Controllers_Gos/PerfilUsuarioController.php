<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Verificar si hay token de autenticación
        if (!$request->session()->has('token')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        $token = $request->session()->get('token');

        try {
            // Intentar obtener los datos del usuario con el token
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Depurar el estado y el contenido de la respuesta
            dd($response->status(), $response->json());

            // Si la respuesta es exitosa, mostrar perfil
            if ($response->successful()) {
                $userData = $response->json()['user_data'];
                return view('perfilUser.index', ['user' => $userData]);
            }

            // Si falla, redirigir a login
            return redirect()->route('login')->with('error', 'Sesión expirada');

        } catch (\Exception $e) {
            // Registrar el error para depuración
            Log::error('Error al obtener datos de perfil: ' . $e->getMessage());

            // En caso de error, redirigir a login
            return redirect()->route('login')->with('error', 'Error al validar sesión');
        }
    }
}
