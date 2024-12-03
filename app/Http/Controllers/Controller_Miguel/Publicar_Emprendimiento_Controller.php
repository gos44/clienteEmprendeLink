<?php

namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Publicar_Emprendimiento_Controller extends Controller
{
      // Paso 1: Mostrar formulario
      public function paso1()
      {
          return view('views_Miguel.Publicar_Emprendimiento1');
      }
  
      // Paso 1: Guardar datos
      public function guardarPaso1(Request $request)
      {
          $request->validate([
              'name' => 'required|string|max:255',
              'slogan' => 'required|string|max:255',
              'category' => 'required|string|max:255',
          ]);
  
          $data = $request->only(['name', 'slogan', 'category']);
  
          try {
              $response = Http::post(
                  'https://apiemprendelink-production-9272.up.railway.app/api/publicare',
                  $data
              );
  
              if ($response->successful()) {
                  session(['publish_Entrepreneurships_id' => $response->json('id')]);
                  return redirect()->route('guardarPaso2');
              }
  
              return back()->withErrors($response->json('errors', ['Error desconocido al crear el emprendimiento.']))
                  ->withInput();
          } catch (\Exception $e) {
              return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                  ->withInput();
          }
      }
  
      // Paso 2: Mostrar formulario
      public function paso2()
      {
          return view('views_Miguel.Publicar_Emprendimiento2');
      }
  
      // Paso 2: Guardar datos
      public function guardarPaso2(Request $request)
      {
          $request->validate([
              'logo_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
              'background' => 'required|image|mimes:jpeg,png,jpg|max:2048',
              'product_images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
              'name_products' => 'required|string|max:255',
              'product_descriptions' => 'required|string|max:1000',
          ]);
  
          $entrepreneurshipId = session('publish_Entrepreneurships_id');
          if (!$entrepreneurshipId) {
              return redirect()->route('guardarPaso2')->withErrors(['error' => 'El ID del emprendimiento no está disponible.']);
          }
  
          try {
              $data = [
                  'logo_path' => $request->file('logo_path')->store('images/logos', 'public'),
                  'background' => $request->file('background')->store('images/backgrounds', 'public'),
                  'product_images' => collect($request->file('product_images'))->map(function ($image) {
                      return $image->store('images/products', 'public');
                  })->toArray(),
                  'name_products' => $request->input('name_products'),
                  'product_descriptions' => $request->input('product_descriptions'),
              ];
  
              $response = Http::post(
                  "https://apiemprendelink-production-9272.up.railway.app/api/publicare/{$entrepreneurshipId}/images",
                  $data
              );
  
              if ($response->successful()) {
                  return redirect()->route('guardarPaso2');
              }
  
              return back()->withErrors($response->json('errors', ['Error desconocido al guardar las imágenes y productos.']))
                  ->withInput();
          } catch (\Exception $e) {
              return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                  ->withInput();
          }
      }
  
      // Paso 3: Mostrar formulario
      public function paso3()
      {
          return view('views_Miguel.Publicar_Emprendimiento3');
      }
  
      // Paso 3: Guardar datos
      public function guardarPaso3(Request $request)
      {
          $request->validate([
              'general_description' => 'required|string|max:2000',
          ]);
  
          $entrepreneurshipId = session('publish_Entrepreneurships_id');
          if (!$entrepreneurshipId) {
              return redirect()->route('guardarPaso1')->withErrors(['error' => 'El ID del emprendimiento no está disponible.']);
          }
  
          $data = $request->only('general_description');
  
          try {
              $response = Http::post(
                  "https://apiemprendelink-production-9272.up.railway.app/api/publicare/{$entrepreneurshipId}/finalize",
                  $data
              );
  
              if ($response->successful()) {
                  session()->forget('publish_Entrepreneurships_id');
                  return redirect()->route('MisEmpredimientos.index')->with('success', '¡Emprendimiento publicado con éxito!');
              }
  
              return back()->withErrors($response->json('errors', ['Error desconocido al finalizar la publicación.']))
                  ->withInput();
          } catch (\Exception $e) {
              return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                  ->withInput();
          }
      }
  }