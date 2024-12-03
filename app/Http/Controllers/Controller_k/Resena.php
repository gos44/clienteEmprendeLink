<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Resena extends Controller
{
    public function Resena()
{
    $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/review?included=entrepreneur,entrepreneurship,investor');

    if ($response->successful()) {
        $data = $response->json();

        $reviews = collect($data)->map(function ($review) {
            return [
                'qualification' => $review['qualification'] ?? null,
                'comment' => $review['comment'] ?? '',
                'entrepreneurship_name' => $review['entrepreneurship']['name'] ?? 'Desconocido',
                'investor_name' => $review['investor']['name'] ?? 'Anónimo',
            ];
        });
    } else {
        $reviews = [];
    }

    return view('kevin/Reseña', compact('reviews'));
}

   
   
}
