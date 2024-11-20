<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Pass the user data to the view
        return view('dashboard', compact('user'));
    }
}
