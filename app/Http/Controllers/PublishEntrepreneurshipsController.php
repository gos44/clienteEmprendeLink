<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class PublishEntrepreneurshipsController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    // Método para mostrar la lista de emprendimientos
    public function index()
    {
        $url = env('URL_SERVER_API');
        $publishEntrepreneurships = $this->fetchDataFromApi($url . '/publicare?included=entrepreneurs');

        // Si los datos están vacíos, retornamos un array vacío
        if (!$publishEntrepreneurships) {
            $publishEntrepreneurships = [];
        }

        return view('publish_Entrepreneurships.index', compact('publishEntrepreneurships'));
    }

    // Método para mostrar los detalles de un emprendimiento
    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $publishEntrepreneurship = $this->fetchDataFromApi($url . '/publicare/' . $id);

        // Si los datos están vacíos, retornamos un array vacío
        if (!$publishEntrepreneurship) {
            $publishEntrepreneurship = [];
        }

        return view('publish_Entrepreneurships.show', compact('publishEntrepreneurship'));
    }

    public function Publicar_emprendimiento (){
        return view('PublicarEmprendimiento.Publicaremprendimiento');//llamamos la carpeta donde esta u bicada la vista y despues el archivo dentro la vista 
    }
}
