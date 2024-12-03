<?php
namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index($id) // Recibir $id
    {
        // Validar si el ID está presente y es un número
        if (!$id || !is_numeric($id)) {
            abort(404, 'Usuario no encontrado.');
        }

        // Hacer la solicitud GET a la API
        $response = Http::get("https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneurs/{$id}?included=user");

        if ($response->successful()) {
            $data = $response->json();
            $connections = $data['data'] ?? [];
        } else {
            $connections = []; // Manejar el caso de error
        }

        return view('Views_gos.PerfilUsuario', compact('connections'));
    }
}
