<?php

namespace App\Http\Controllers\Controller_Miguel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Necesario para enviar la solicitud HTTP

class Publicar_Emprendimiento extends Controller
{
    public function paso1()
    {
        return view('emprendimientos.paso1');
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
            // Enviar la solicitud POST a la API para crear el emprendimiento
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/publicare', $data);

            // Comprobar si la respuesta fue exitosa
            if ($response->successful()) {
                // Redirigir al siguiente paso del proceso de publicación
                return redirect()->route('Publicar_Emprendimiento2')->with('emprendimiento_id', $response->json()['id']);
            } else {
                // Si la API devuelve errores, mostrarlos al usuario
                return back()->withErrors($response->json()['errors'] ?? ['Error al crear el emprendimiento.'])->withInput();
            }
        } catch (\Exception $e) {
            // Manejo de excepciones en caso de fallo en la conexión o error en la API
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function paso2()
    {
        return view('emprendimientos.paso2');
    }

    public function guardarPaso2(Request $request)
    {
        // Validación de los datos del segundo paso
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'portada' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'products.*.image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'products.*.descripcion' => 'required|string',
        ]);

        // Preparar los datos de imágenes y productos para enviar a la API
        $data = [
            'logo' => $request->file('logo')->store('logos', 'public'),
            'portada' => $request->file('portada')->store('portadas', 'public'),
            'products' => $request->input('products'),  // Asegúrate de que el formato de 'products' sea el correcto
        ];

        try {
            // Enviar la solicitud POST a la API para guardar los datos del paso 2
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/publicare', $data);

            // Comprobar si la respuesta fue exitosa
            if ($response->successful()) {
                // Redirigir al siguiente paso del proceso de publicación
                return redirect()->route('Publicar_Emprendimiento3');
            } else {
                // Si la API devuelve errores, mostrarlos al usuario
                return back()->withErrors($response->json()['errors'] ?? ['Error al guardar las imágenes y productos.'])->withInput();
            }
        } catch (\Exception $e) {
            // Manejo de excepciones en caso de fallo en la conexión o error en la API
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function paso3()
    {
        return view('emprendimientos.paso3');
    }

    public function guardarPaso3(Request $request)
    {
        // Validación de los datos del tercer paso
        $request->validate([
            'descripcion_general' => 'required|string',
        ]);

        // Preparar los datos para el último paso
        $data = [
            'descripcion_general' => $request->input('descripcion_general'),
        ];

        try {
            // Enviar la solicitud POST a la API para guardar los datos del paso 3
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/publicare', $data);

            // Comprobar si la respuesta fue exitosa
            if ($response->successful()) {
                // Redirigir a la página de los emprendimientos del usuario
                return redirect()->route('MisEmpredimientos.index')->with('success', '¡Emprendimiento publicado!');
            } else {
                // Si la API devuelve errores, mostrarlos al usuario
                return back()->withErrors($response->json()['errors'] ?? ['Error al finalizar la publicación.'])->withInput();
            }
        } catch (\Exception $e) {
            // Manejo de excepciones en caso de fallo en la conexión o error en la API
            return back()->withErrors(['error' => 'No se pudo conectar con el servidor. ' . $e->getMessage()])
                ->withInput();
        }
    }

}
