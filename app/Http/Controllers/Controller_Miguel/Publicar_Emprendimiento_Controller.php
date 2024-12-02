<?php

namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Publicar_Emprendimiento_Controller extends Controller
{
    public function paso1()
    {
        return view('views_Miguel.Publicar_Emprendimiento1');
    }

    public function guardarPaso1(Request $request)
    {
        // Validación de los datos del primer paso
        $request->validate([
            'nombre_emprendimiento' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
        ]);

        // Preparar los datos para enviarlos a la API
        $data = [
            'nombre_emprendimiento' => $request->input('nombre_emprendimiento'),
            'descripcion' => $request->input('descripcion'),
            'categoria' => $request->input('categoria'),
        ];

        try {
            $response = Http::post(
                'https://apiemprendelink-production-9272.up.railway.app/api/publicare',
                $data
            );

            if ($response->successful()) {
                return redirect()->route('paso2')->with('emprendimiento_id', $response->json('id'));
            } else {
                $errors = $response->json('errors', ['Error desconocido al crear el emprendimiento.']);
                return back()->withErrors($errors)->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function paso2()
    {
        return view('views_Miguel.Publicar_Emprendimiento2');
    }

    public function guardarPaso2(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'portada' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'products.*.image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'products.*.descripcion' => 'required|string',
        ]);

        try {
            $data = [
                'logo' => $request->file('logo')->store('logos', 'public'),
                'portada' => $request->file('portada')->store('portadas', 'public'),
                'products' => $request->input('products'),
            ];

            $response = Http::post(
                'https://apiemprendelink-production-9272.up.railway.app/api/publicare',
                $data
            );

            if ($response->successful()) {
                return redirect()->route('paso3');
            } else {
                $errors = $response->json('errors', ['Error desconocido al guardar las imágenes y productos.']);
                return back()->withErrors($errors)->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function paso3()
    {
        return view('views_Miguel.Publicar_Emprendimiento3');
    }

    public function guardarPaso3(Request $request)
    {
        $request->validate([
            'descripcion_general' => 'required|string',
        ]);

        $data = [
            'descripcion_general' => $request->input('descripcion_general'),
        ];

        try {
            $response = Http::post(
                'https://apiemprendelink-production-9272.up.railway.app/api/publicare',
                $data
            );

            if ($response->successful()) {
                return redirect()->route('MisEmpredimientos.index')->with('success', '¡Emprendimiento publicado!');
            } else {
                $errors = $response->json('errors', ['Error desconocido al finalizar la publicación.']);
                return back()->withErrors($errors)->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }
}
