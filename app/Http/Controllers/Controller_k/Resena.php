<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Resena extends Controller
{
    public function Resena()
    {
       // Hacer la solicitud GET a la API para obtener todas las reseñas
       $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/review');

       // Verificar si la respuesta es exitosa
       if ($response->successful()) {
           // Obtener los datos del cuerpo de la respuesta
           $reviews = $response->json();
       } else {
           // En caso de error, inicializar el arreglo vacío
           $reviews = [];
       }

       // Retornar la vista con las reseñas
       return view('kevin/Reseña', compact('reviews'));
   }

   
   
}
