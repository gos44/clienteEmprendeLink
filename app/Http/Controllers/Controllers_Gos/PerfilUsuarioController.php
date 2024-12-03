<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index()
    {
        $id = Http::get("https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneur");

        $response = Http::get("https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneurs/{$id}?included=user");
        
        if ($response->successful()) {
            $data = $response->json();
            $connections = $data['data'] ?? [];
            
            // Opcional: Pasar más datos a la vista si es necesario
            return view('Views_gos.PerfilUsuario', compact('connections', 'id'));
        } else {
            $connections = [];
            return view('Views_gos.PerfilUsuario', compact('connections', 'id'));
        }
    }
}
