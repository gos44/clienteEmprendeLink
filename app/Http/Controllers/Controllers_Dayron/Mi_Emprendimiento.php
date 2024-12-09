<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class Mi_Emprendimiento extends Controller
{
    public function show($id)
    {
        try {
            // Log the ID being requested
            Log::info("Requesting entrepreneurship with ID: " . $id);

            // Make API request to get specific entrepreneurship by ID
            $response = Http::get("https://apiemprendelink-production-9272.up.railway.app/api/publicare/{$id}");
            
            // Log the raw response
            Log::info("API Response: ", [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            if ($response->successful()) {
                // Parse the JSON response
                $data = $response->json();
                
                // Log the parsed data
                Log::info("Parsed Data: ", $data);

                // Check if data exists
                if (isset($data['data'])) {
                    $emprendimiento = $data['data'];
                    
                    // Pass the data to the view
                    return view('Views_Dayron.Mi_Emprendimiento', [
                        'emprendimiento' => $emprendimiento
                    ]);
                } else {
                    Log::error("No data found in the response");
                    return back()->with('error', 'No se encontraron datos del emprendimiento');
                }
            } else {
                // Log the error response
                Log::error("API Request Failed", [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                // Handle API request failure
                return back()->with('error', 'No se pudo obtener el emprendimiento. Código de estado: ' . $response->status());
            }
        } catch (\Exception $e) {
            // Log the full exception
            Log::error("Exception in show method: ", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Handle any exceptions
            return back()->with('error', 'Ocurrió un error: ' . $e->getMessage());
        }
    }
}