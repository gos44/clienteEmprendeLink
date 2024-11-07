<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class entrepreneursController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        // Llamada HTTP GET a la API
        $response = Http::get($url);

        // Verificación de éxito en la respuesta de la API
        if ($response->successful()) {
            return $response->json();
        } else {
            return []; // Devuelve un array vacío en caso de error
        }
    }

    // Método para listar todos los inversores
    public function index()
    {
        $url = env('URL_SERVER_API');

        $Entrepreneurs = $this->fetchDataFromApi($url . '/Entrepreneurs');

        return view('Entrepreneurs.index', compact('Entrepreneurs')); // Asegúrate de que el nombre de la vista esté en minúsculas
    }

    // Método para mostrar detalles de un inversor específico
    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $Entrepreneur = $this->fetchDataFromApi($url . '/Entrepreneurs' . $id );

        return view('Entrepreneurs.show', compact('Entrepreneur')); // Asegúrate de que el nombre de la vista esté en minúsculas
    }
}
