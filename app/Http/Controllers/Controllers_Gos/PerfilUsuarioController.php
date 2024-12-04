<?php


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
            // Enviar los datos a la vista
            $data = $response->json(); // Decodificar JSON a un arreglo
            return view('Views_gos.PerfilUsuario', ['connections' => $data]); // Enviar datos a la vista
        } else {
            // Enviar un mensaje de error a la vista
            $error = 'No se pudieron cargar los datos del perfil';
            return view('Views_gos.PerfilUsuario', ['error' => $error]);
        }
    }
}
