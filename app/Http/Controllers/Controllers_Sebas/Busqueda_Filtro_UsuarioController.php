<?php
namespace App\Http\Controllers\Controllers_Sebas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Busqueda_Filtro_UsuarioController extends Controller 
{
    public function index()
    {
        $client = new Client();

        try {
            // Realizar la solicitud GET a la API
            $response = $client->request('GET', 'https://apiemprendelink-production-9272.up.railway.app/api/publicare');
            
            // Obtener el contenido de la respuesta
            $publicaciones = json_decode($response->getBody(), true);

            // Pasar las publicaciones a la vista
            return view('Views_Sebas.Busqueda_Filtro_Usuario', ['publicaciones' => $publicaciones]);

        } catch (RequestException $e) {
            // Manejo de errores
            return view('Views_Sebas.Busqueda_Filtro_Usuario', [
                'error' => 'No se pudieron cargar las publicaciones: ' . $e->getMessage()
            ]);
        }
    }
}