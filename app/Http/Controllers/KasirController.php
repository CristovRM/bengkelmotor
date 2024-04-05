<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; // Import model Transaction

class KasirController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all(); // Ambil semua data transaksi dari database
        return view('kasir.index', ['transactions' => $transactions]); // Kirim data transaksi ke tampilan
    }
}
