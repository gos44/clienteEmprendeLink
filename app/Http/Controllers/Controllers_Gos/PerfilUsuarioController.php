<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB; // Add this to use DB facade
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index($id) // Receive the $id
    {
        // Validate if the ID is present and is a number
        if (!$id || !is_numeric($id)) {
            abort(404, 'Usuario no encontrado.');
        }

        // Fetch the user data from the database
        $emprendedor = DB::table('entrepreneurs')
            ->where('id', $id)
            ->first();  // This will fetch the first match of the ID

        if (!$emprendedor) {
            abort(404, 'Usuario no encontrado en la base de datos.');
        }

        // If necessary, make the GET request to the external API for additional data
        $response = Http::get("https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneurs/{$id}?included=user");

        if ($response->successful()) {
            $data = $response->json();
            $connections = $data['data'] ?? [];
        } else {
            $connections = []; // Handle the error case
        }

        // Return the data to the view
        return view('Views_gos.PerfilUsuario', compact('connections', 'emprendedor'));
    }
}
