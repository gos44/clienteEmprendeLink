<?php

namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Publicar_Emprendimiento_Controller extends Controller
{
    public function index()
    {
        return view('views_Miguel.Publicar_Emprendimiento1');
    }
    
    public function guardarEmprendimiento(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'logo_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'background' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'product_images' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name_products' => 'required|string|max:255',
            'product_descriptions' => 'required|string|max:1000',
            'general_description' => 'required|string|max:2000',
        ]);
    
        try {
            // Paso 1: Crear emprendimiento
            $entrepreneurshipData = [
                'name' => $request->input('name'),
                'slogan' => $request->input('slogan'),
                'category' => $request->input('category'),
            ];
    
            $responseEntrepreneurship = Http::post(
                'https://apiemprendelink-production-9272.up.railway.app/api/publicare',
                $entrepreneurshipData
            );
    
            if (!$responseEntrepreneurship->successful()) {
                return back()->withErrors($responseEntrepreneurship->json('errors', ['Error al crear el emprendimiento.']))
                    ->withInput();
            }
    
            $entrepreneurshipId = $responseEntrepreneurship->json('id');
    
            // Paso 2: Subir imágenes y productos
            $imageData = [
                'logo_path' => $request->file('logo_path')->store('images/logos', 'public'),
                'background' => $request->file('background')->store('images/backgrounds', 'public'),
                'product_images' => $request->file('product_images')->store('images/products', 'public'),
                'name_products' => $request->input('name_products'),
                'product_descriptions' => $request->input('product_descriptions'),
            ];
    
            $responseImages = Http::post(
                "https://apiemprendelink-production-9272.up.railway.app/api/publicare/{$entrepreneurshipId}/images",
                $imageData
            );
    
            if (!$responseImages->successful()) {
                return back()->withErrors($responseImages->json('errors', ['Error al subir imágenes y productos.']))
                    ->withInput();
            }
    
            // Paso 3: Finalizar con descripción general
            $finalizeData = [
                'general_description' => $request->input('general_description'),
            ];
    
            $responseFinal = Http::post(
                "https://apiemprendelink-production-9272.up.railway.app/api/publicare/{$entrepreneurshipId}/finalize",
                $finalizeData
            );
    
            if (!$responseFinal->successful()) {
                return back()->withErrors($responseFinal->json('errors', ['Error al finalizar la publicación.']))
                    ->withInput();
            }
    
            return redirect()->route('MisEmpredimientos.index')->with('success', '¡Emprendimiento publicado con éxito!');
    
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }
  }