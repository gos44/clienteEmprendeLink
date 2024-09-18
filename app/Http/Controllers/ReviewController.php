<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;


class ReviewController extends Controller
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

    // Método para mostrar la lista de reseñas
    public function index()
    {
        $url = env('URL_SERVER_API');
        
        // Obteniendo los datos de la API
        $reviews = $this->fetchDataFromApi($url . '/Reviews?included=post');

        return view('Reviews.index', compact('reviews')); // 'reviews' en minúscula
    }

    // Método para mostrar una reseña específica por ID
    public function show($id)
    {
        $url = env('URL_SERVER_API');
        
        // Obteniendo un solo dato de la API por ID
        $review = $this->fetchDataFromApi($url . '/Reviews/' . $id);

        // Pasando los datos a la vista 'Reviews.show'
        return view('Reviews.show', compact('review')); // 'review' para un solo registro
    }
}