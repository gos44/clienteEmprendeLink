<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index()
    {
        $userId = 1; // Reemplaza con el ID de usuario que obtuviste en Postman
    
        $response = Http::get("https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneurs/{$userId}?included=user");
        
      // En el controlador
        if ($response->successful()) {
            $connections = $response->json()['data'] ?? [];
            if (empty($connections)) {
                return view('Views_gos.PerfilUsuario', compact('connections'))->with('error', 'No se encontraron datos del perfil.');
            }
            return view('Views_gos.PerfilUsuario', compact('connections'));
        } else {
            return view('Views_gos.PerfilUsuario', compact('connections'))->with('error', 'Ocurrió un error al cargar los datos del perfil.');
        }
    }
}
