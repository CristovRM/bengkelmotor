<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Pembelian;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'kasir') {
            return redirect()->route('kasir.dashboard');
        }
        
        $totalUsers = User::count();
        $totalKaryawan = Karyawan::count();
        $totalKategori = Kategori::count();
        $totalProduk = Produk::count();
        $totalSupplier = Supplier::count();
        $totalPembelian = Pembelian::count();
        $laporanTransaksi = Transaksi::count();

        return view('dashboar', compact('totalUsers', 'totalKaryawan', 'totalKategori', 'totalProduk', 'totalSupplier','totalPembelian','laporanTransaksi'));
        return view('dashboard');
    }   

}   

