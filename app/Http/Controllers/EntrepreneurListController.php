<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class EntrepreneurListController extends Controller
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
    
            $entrepreneurLists = $this->fetchDataFromApi($url . '/entrepreneurLists?included=post');
     
           
    
            return view('EntrepreneurLists.index', compact('entrepreneurLists'));
        }
    
        public function show($id)
        {
            $url = env('URL_SERVER_API');
    
            $entrepreneurList = $this->fetchDataFromApi($url . '/entrepreneurLists/' . $id);
    
            return view('EntrepreneurLists.show', compact('entrepreneurList'));
        }
    }