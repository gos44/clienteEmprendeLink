<?php
namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ResenaInver extends Controller {
    public function index(Request $request)
{
    $reviews = [];
    $entrepreneurId = $request->input('entrepreneur_id');
    $userData = null;

    try {
        // Recuperar los datos del inversor
        $token = session('token', null);
        if (!$token) {
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        $userResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

        if ($userResponse->successful()) {
            $userData = $userResponse->json();
        }

        // Recuperar las reseñas
        $url = 'https://apiemprendelink-production-9272.up.railway.app/api/review';
        if ($entrepreneurId) {
            $url .= '?entrepreneur_id=' . $entrepreneurId;
        }
        $response = Http::get($url);

        if ($response->successful()) {
            $reviews = $response->json();
        } else {
            Log::error('Error en la API: ' . $response->body());
        }
    } catch (\Exception $e) {
        Log::error('Error al obtener datos: ' . $e->getMessage());
        return back()->withErrors(['error' => 'No se pudieron cargar los datos.']);
    }

    return view('kevin.ReseñaInver', [
        'reviews' => $reviews, 
        'entrepreneurId' => $entrepreneurId,
        'user' => $userData
    ]);
}
    

    public function store(Request $request) 
    {
        // Validate input
        $validated = $request->validate([
            'entrepreneur_id' => 'required|integer',
            'comment' => 'required|string|max:500',
            'qualification' => 'required|integer|min:1|max:5',
        ]);

        try {
            // Get the current user's token
            $token = session('token', null);
            if (!$token) {
                return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
            }
        
            // Get user data to confirm identity
            $userResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');
        
            if (!$userResponse->successful()) {
                return back()->withErrors(['error' => 'No se pudo autenticar al usuario.']);
            }
        
            $userData = $userResponse->json();
            
            // Prepare data for review submission
            $data = [
                'entrepreneur_id' => $validated['entrepreneur_id'],
                'investor_id' => $userData['id'], // Use the authenticated user's ID
                'comment' => $validated['comment'],
                'qualification' => $validated['qualification'],
            ];
        
            // Submit review to API
            $response = Http::post('https://apiemprendelink-production-9272.up.railway.app/api/review', $data);
        
            if ($response->successful()) {
                return redirect()->route('resenaInver.index', ['entrepreneur_id' => $validated['entrepreneur_id']])
                    ->with('success', 'Reseña creada exitosamente.');
            } else {
                // Handle API errors
                $errorDetails = $response->json();
                return back()->withErrors($errorDetails['message'] ?? 'Error desconocido al crear la reseña')
                    ->withInput();
            }
        } catch (\Exception $e) {
            // Handle connection or other exceptions
            return back()->withErrors(['error' => 'No se pudo conectar con la API: ' . $e->getMessage()])
                ->withInput();
        }
    }
}