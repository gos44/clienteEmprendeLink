<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
//use Illuminate\Routing\Controller as RoutingController;

class PublishEntrepreneurshipsController extends Controller
{
    
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()   //http://api.codersfree.test/v1/categories?included=posts
    {

        $url = env('URL_SERVER_API');

        $publishEntrepreneurships = $this->fetchDataFromApi($url . '/publicare?included=posts');
 
       

        return view('publish_Entrepreneurships.index', compact('publicare'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $publishEntrepreneurships = $this->fetchDataFromApi($url . '/publicare/' . $id);

        return view('publish_Entrepreneurships.show', compact('publicare'));
    }
}