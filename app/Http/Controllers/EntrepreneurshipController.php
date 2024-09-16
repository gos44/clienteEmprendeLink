<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class EntrepreneurshipController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        
        // Comprobación de errores en la respuesta de la API
        if ($response->successful()) {
            return $response->json();
        } else {
            return []; // Devuelve un array vacío en caso de error
        }
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $entrepreneurships = $this->fetchDataFromApi($url . '/entrepreneurships?included=entrepreneur,publishEntrepreneurships,investor');

        return view('Entrepreneurships.index', compact('entrepreneurships'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $entrepreneurship = $this->fetchDataFromApi($url . '/entrepreneurships/' . $id . '?included=entrepreneur,publishEntrepreneurships,investor');

        return view('Entrepreneurships.show', compact('entrepreneurship'));
    }
}
