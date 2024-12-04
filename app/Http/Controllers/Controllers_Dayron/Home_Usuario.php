<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Home_Usuario extends Controller
{
    public function __construct()
    {
        // Ensure the user is authenticated before accessing this controller
        $this->middleware('auth');
    }

    public function index()
    {
        // If the user is authenticated, show the home page
        return view('Views_Dayron.Home_Usuario');
    }
}

