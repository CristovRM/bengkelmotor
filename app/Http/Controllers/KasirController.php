<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;

class KasirController extends Controller
{
    public function index()
    {
    
        if (auth()->user()->role !== 'kasir') {
            return redirect()->route('dashboard');
        }

        $transaksis = Transaksi::latest()->paginate(10);
        return view('kasir.dashboard', compact('transaksis'));
    }
}
