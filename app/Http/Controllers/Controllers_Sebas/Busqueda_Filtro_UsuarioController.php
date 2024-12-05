<?php

namespace App\Http\Controllers\Controllers_Sebas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class Busqueda_Filtro_UsuarioController extends Controller 
{
    public function index(Request $request)
    {
        try {
            // Hacer la solicitud GET a la API
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/publicare');

            if ($response->successful()) {
                $data = $response->json('data');

                // Procesar los datos como antes
                $publicacionesArray = array_map(function($item) {
                    $item['imagen_fondo'] = $item['background'];
                    $item['logo'] = $item['logo_path'];
                    return $item;
                }, $data);

                // Convertir el array a una colección
                $publicaciones = new Collection($publicacionesArray);

                // Obtener la página actual
                $page = $request->get('page', 1);

                // Crear el paginador (6 items por página)
                $perPage = 6;
                $offset = ($page - 1) * $perPage;

                // Crear un paginador personalizado
                $paginator = new LengthAwarePaginator(
                    $publicaciones->slice($offset, $perPage),
                    $publicaciones->count(),
                    $perPage,
                    $page,
                    ['path' => $request->url(), 'query' => $request->query()]
                );

            } else {
                $paginator = new LengthAwarePaginator(
                    [],
                    0,
                    6,
                    1
                );

                Log::error('Error al obtener publicaciones', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }

            return view('Views_Sebas.Busqueda_Filtro_Usuario', ['publicaciones' => $paginator]);

        } catch (\Exception $e) {
            Log::error('Excepción al obtener publicaciones', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            $paginator = new LengthAwarePaginator(
                [],
                0,
                6,
                1
            );

            return view('Views_Sebas.Busqueda_Filtro_Usuario', [
                'publicaciones' => $paginator,
                'error' => 'No se pudieron cargar las publicaciones'
            ]);
        }
    }
}