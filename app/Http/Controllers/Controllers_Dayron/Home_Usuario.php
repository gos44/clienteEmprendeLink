<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Home_Usuario extends Controller
{
    public function index()
    {
    
        // Lógica del dashboard
        return view('Views_Dayron.Home_Usuario');
    }
}
