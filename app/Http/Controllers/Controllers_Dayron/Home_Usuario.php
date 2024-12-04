<?php
namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home_Usuario extends Controller
{
    public function index(Request $request)
    {
        // Optional: Get the authenticated user's details
        $user = $request->user();
        
        return view('Views_Dayron.Home_Usuario', compact('user'));
    }
}