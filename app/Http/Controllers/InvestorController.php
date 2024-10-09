<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class InvestorController extends Controller
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

        $investors = $this->fetchDataFromApi($url . '/investors?included=entrepreneurs');

        return view('investors.index', compact('investors')); // Asegúrate de que el nombre de la vista esté en minúsculas
    }

    // Método para mostrar detalles de un inversor específico
    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $investor = $this->fetchDataFromApi($url . '/investors/' . $id . '?included=entrepreneurs');

        return view('investors.show', compact('investor')); // Asegúrate de que el nombre de la vista esté en minúsculas
    }
}
