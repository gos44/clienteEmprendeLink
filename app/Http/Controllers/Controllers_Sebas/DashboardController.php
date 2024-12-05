<?php

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController  extends Controller
{
    public function index()
    {
        // Lógica del dashboard
        return view('Views_Dayron.Home_Usuario');
    }

}
