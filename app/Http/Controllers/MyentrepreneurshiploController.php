<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MyentrepreneurshipController extends Controller
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

        $myentrepreneurships = $this->fetchDataFromApi($url . '/myentrepreneurships?included=entrepreneur,Entrepreneurships,investor','publish_Entrepreneurships');

        return view('Myentrepreneurships.index', compact('myentrepreneurships'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $myentrepreneurship = $this->fetchDataFromApi($url . '/myentrepreneurships/' . $id . '?included=entrepreneur,Entrepreneurships,investor');

        return view('Myentrepreneurships.show', compact('myentrepreneurship'));
    }
}
