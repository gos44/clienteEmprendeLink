<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Intentar obtener el token de múltiples fuentes
        $token = $request->session()->get('token') ??
                 $request->session()->get('user_token') ??
                 \Session::get('token') ??
                 $request->get('token') ??
                 $request->bearerToken() ??
                 $request->header('Authorization') ??
                 null;

        if (!$token) {
            return response()->json([
                'error' => 'No se encontró token de autenticación',
                'status' => 'unauthorized',
                'debug' => [
                    'session_data' => $request->session()->all(),
                    'request_all' => $request->all()
                ]
            ], 401);
        }

        try {
            // Hacer la solicitud a la API con el token
            $response = Http::withToken($token)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ])
                ->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                $userData = $response->json();

                // Pasar los datos a la vista
                return view('perfil.index', compact('userData')); // Cambia 'perfil.index' al nombre de tu vista
            } else {
                return response()->json([
                    'error' => 'No se pudo obtener los datos del usuario',
                    'status' => $response->status(),
                    'body' => $response->body(),
                ], $response->status());
            }

        } catch (\Exception $e) {
            // Manejo de errores detallado
            return response()->json([
                'error' => 'Error al procesar la solicitud',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}
