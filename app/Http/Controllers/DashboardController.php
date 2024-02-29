<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        // Tambahkan logika yang diperlukan di sini
        return view('dashboard');
    }
}
    
