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
        
        if ($response->successful()) {
            $connections = $response->json()['data'] ?? [];
            
            return view('Views_gos.PerfilUsuario', compact('connections'));
        } else {
            // Manejar errores
            return back()->with('error', 'No se pudieron cargar los datos del perfil');
        }
    }
}
