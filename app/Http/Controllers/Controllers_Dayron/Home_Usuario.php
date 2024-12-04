<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Home_Usuario extends Controller
{
    public function index()
    {
        return view('Views_Dayron.Home_Usuario');
    }
}

