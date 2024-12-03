<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Resena extends Controller
{
    public function Resena()
    {
      // Solicitud GET a la API
        $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/review?included=entrepreneur,Entrepreneurship,investor');

        // Verificar si la respuesta fue exitosa
        if ($response->successful()) {
            $reviews = $response->json();
        } else {
            $reviews = [];
        }

        // Pasar los datos a la vista
        return view('kevin/Reseña', compact('reviews'));
    }

   
   
}
