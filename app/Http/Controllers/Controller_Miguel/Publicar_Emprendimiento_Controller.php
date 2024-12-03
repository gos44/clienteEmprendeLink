<?php

namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            'general_description' => 'required|string|max:2000',
        ]);

        try {
            // Subir imágenes a Cloudinary
            $logoUpload = Cloudinary::upload($request->file('logo_path')->getRealPath(), [
                'folder' => 'emprendelink/logos',
            ]);
            $backgroundUpload = Cloudinary::upload($request->file('background')->getRealPath(), [
                'folder' => 'emprendelink/backgrounds',
            ]);

            // Obtener las URLs de las imágenes subidas
            $logoUrl = $logoUpload->getSecurePath();
            $backgroundUrl = $backgroundUpload->getSecurePath();

            // Preparar datos para la API
            $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/publicare', [
                'name' => $request->name,
                'slogan' => $request->slogan,
                'category' => $request->category,
                'logo_path' => $logoUrl,
                'background' => $backgroundUrl,
                'general_description' => $request->general_description,
            ]);

            if ($response->successful()) {
                return response()->json($response->json(), 201); // Retorna el emprendimiento creado
            }

            return back()->withErrors(['error' => 'No se pudo guardar el emprendimiento.']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
