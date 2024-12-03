<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index()
{
    // Correctly fetch the entrepreneur ID
    $entrepreneurResponse = Http::get("https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneur");
    
    // Check if the response is successful and contains an ID
    if ($entrepreneurResponse->successful()) {
        $entrepreneurData = $entrepreneurResponse->json();
        $id = $entrepreneurData['id'] ?? null; // Safely extract the ID
        
        if ($id) {
            $response = Http::get("https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneurs/{$id}?included=user");
            
            if ($response->successful()) {
                $data = $response->json();
                $connections = $data['data'] ?? [];
                
                return view('Views_gos.PerfilUsuario', compact('connections', 'id'));
            }
        }
    }
    
    // Handle error cases
    $connections = [];
    $id = null;
    return view('Views_gos.PerfilUsuario', compact('connections', 'id'));
}
}
