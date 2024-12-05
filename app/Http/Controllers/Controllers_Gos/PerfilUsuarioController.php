<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index()
    {
        $url = 'https://clienteemprendelink-production.up.railway.app/api/auth/me';

        // Obtener el token del usuario autenticado
        $token = Auth::user()->token ?? null; // Reemplaza esto con la forma correcta de obtener el token

        if (!$token) {
            // Si no hay token, redirigir o mostrar un error
            return redirect()->route('login')->withErrors('No tienes acceso. Inicia sesión primero.');
        }

        // Hacer la solicitud a la API con el token en los encabezados
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$token}",
            'Content-Type' => 'application/json',
        ])->post($url);

        if ($response->successful()) {
            $data = $response->json(); // Decodificar JSON a un arreglo
            return view('Views_gos.PerfilUsuario', ['connections' => $data]); // Enviar datos a la vista
        } else {
            // Manejo de errores en la respuesta
            $error = 'No se pudieron cargar los datos del perfil. Error: ' . $response->status();
            return view('Views_gos.PerfilUsuario', ['error' => $error]);
        }
    }
}
