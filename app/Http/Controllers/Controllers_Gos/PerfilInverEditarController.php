<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilInverEditarController extends Controller
{
    // Método para mostrar el perfil del usuario
    // Controlador: PerfilController.php
    // Mostrar el perfil del usuario
    public function show()
    {
        $user = auth()->user(); // Obtener el usuario autenticado
        return view('perfil', compact('user'));
    }

    // Actualizar el perfil del usuario
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'email' => 'required|email|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'number' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validación para la imagen
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->phone = $request->phone;
        $user->number = $request->number;

        // Si se sube una nueva imagen
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->route('perfilInver.show')->with('success', 'Perfil actualizado correctamente.');
    }
}
