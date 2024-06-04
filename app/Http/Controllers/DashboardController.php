<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'kasir') {
            return redirect()->route('kasir.dashboard');
        }
        

        return view('dashboard');
    }   
}
