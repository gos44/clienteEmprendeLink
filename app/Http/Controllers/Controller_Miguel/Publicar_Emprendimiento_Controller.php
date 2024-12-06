<?php

namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class Publicar_Emprendimiento_Controller extends Controller
{
    public function index()
    {
        return view('views_Miguel.Publicar_Emprendimiento1');
    }

    public function guardarEmprendimiento(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'logo_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'background' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'product_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name_products' => 'required|array',
            'product_descriptions' => 'required|array',
            'general_description' => 'required|string|max:2000',
        ]);
    
        try {
            $userId = auth()->id();
    
            // Preparar los datos para la solicitud
            $data = [
                [
                    'name' => 'name',
                    'contents' => $validated['name'],
                ],
                [
                    'name' => 'slogan',
                    'contents' => $validated['slogan'],
                ],
                [
                    'name' => 'category',
                    'contents' => $validated['category'],
                ],
                [
                    'name' => 'general_description',
                    'contents' => $validated['general_description'],
                ],
                [
                    'name' => 'entrepreneurs_id',
                    'contents' => $userId,
                ],
            ];
    
            // Añadir nombres de productos
            foreach ($validated['name_products'] as $product) {
                $data[] = [
                    'name' => 'name_products[]',
                    'contents' => $product,
                ];
            }
    
            // Añadir descripciones de productos
            foreach ($validated['product_descriptions'] as $description) {
                $data[] = [
                    'name' => 'product_descriptions[]',
                    'contents' => $description,
                ];
            }
    
            // Preparar archivos
            $logo = $request->file('logo_path');
            $background = $request->file('background');
    
            // Abrir los archivos en modo lectura
            $logoHandle = fopen($logo->getPathname(), 'rb');
            $backgroundHandle = fopen($background->getPathname(), 'rb');
    
            // Iniciar solicitud HTTP
            $httpRequest = Http::timeout(900)->withHeaders([
                'Accept' => 'application/json',
            ]);
    
            // Adjuntar logo
            $httpRequest->attach('logo_path', $logoHandle, $logo->getClientOriginalName());
    
            // Adjuntar imagen de fondo
            $httpRequest->attach('background', $backgroundHandle, $background->getClientOriginalName());
    
            // Adjuntar imágenes de productos
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $index => $productImage) {
                    $productHandle = fopen($productImage->getPathname(), 'rb');
                    $httpRequest->attach("product_images[$index]", $productHandle, $productImage->getClientOriginalName());
                }
            }
    
            // Enviar solicitud
            $response = $httpRequest->post('https://apiemprendelink-production-9272.up.railway.app/api/publicare', $data);
    
            // Cerrar handles de archivos
            fclose($logoHandle);
            fclose($backgroundHandle);
    
            // Manejar respuesta
            if ($response->successful()) {
                return redirect()->route('MisEmpredimientos.index')
                    ->with('success', '¡Emprendimiento publicado con éxito!');
            } else {
                Log::error('Error en la API', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
    
                return back()
                    ->withErrors(['api_error' => 'Error al publicar: ' . $response->body()])
                    ->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Error interno en la publicación del emprendimiento', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
    
            return back()
                ->withErrors(['error' => 'Error interno: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
