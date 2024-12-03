<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index()
    {
        $url = "https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneurs/1?included=user";
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            // Asegúrate de que la estructura de la respuesta es correcta
            $connections = $data['data'] ?? [];

            // Si los datos vienen en 'attributes', descoméntalo:
            // $connections = $data['data']['attributes'] ?? [];

            return view('Views_gos.PerfilUsuario', compact('connections'));
        } else {
            // Manejo de errores
            return back()->with('error', 'No se pudieron cargar los datos del perfil');
        }
    }
}
