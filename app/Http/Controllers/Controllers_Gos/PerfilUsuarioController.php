<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Intentar obtener el token de múltiples fuentes
        $token = $request->session()->get('token') ??
                 $request->session()->get('user_token') ??
                 \Session::get('token') ??
                 $request->get('token') ??
                 $request->bearerToken() ??
                 $request->header('Authorization') ??
                 null;

        if (!$token) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión primero');
        }

        try {
            // Hacer la solicitud a la API con el token
            $response = Http::withToken($token)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ])
                ->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            if ($response->successful()) {
                $userData = $response->json()['user_data'];

                // Renderizar la vista con los datos del usuario
                return view('perfil', ['user' => $userData]);
            } else {
                return redirect()->route('login')->with('error', 'No se pudo obtener los datos del usuario');
            }

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Ocurrió un error al procesar la solicitud');
        }
    }
}
