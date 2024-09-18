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
            return $response->json();
        }
    
        public function index()
{
    $url = env('URL_SERVER_API');

    // Corrección: asegúrate de que el compact coincida con el nombre de la variable
    $reviews = $this->fetchDataFromApi($url . '/Reviews?included=post');

    return view('Reviews.index', compact('reviews')); // 'reviews' en minúscula
}

public function show($id)
{
    $url = env('URL_SERVER_API');

    $review = $this->fetchDataFromApi($url . '/Reviews/' . $id);

    return view('Reviews.show', compact('review')); // 'review' para un solo registro
}
    }