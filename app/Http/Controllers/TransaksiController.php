<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransaksiController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/transaksi');
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $transaksi = $data['data'];
                return view('transaksi.index', compact('transaksi'));
            } else {
                return view('transaski.index')->withErrors(['msg' => 'Gagal mengambil data transaksi.']);
            }
        } catch (\Exception $e) {
            return view('transaksi.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        $produk = $this->getProduk();
        return view('transaksi.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pembeli' => 'required',
            'nama_produk' => 'required',
            'jumlah' => 'required',          
            'total_harga' => 'required|numeric',
        ]);

        $response = Http::post('http://127.0.0.1:8000/api/transaksi', $validatedData);
        $data = json_decode($response->body(), true);

        if ($response->successful() && $data['status']) {
            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
        } else {
            return redirect()->route('transaksi.create')->withErrors(['msg' => 'Gagal menambahkan transaski']);
        }
    }

    
    public function show($id)
    {
        try {
            $response = Http::get("http://127.0.0.1:8000/api/transaksi/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $transaksi = $data['data'];
                return view('transaksi.show', compact('transaksi'));
            } else {
                return redirect()->route('transaksi.index')->withErrors(['msg' => 'Transaksi tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('transaksi.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    private function getProduk()
    {
        $response = Http::get('http://127.0.0.1:8000/api/produk');
        $produk = json_decode($response->body(), true)['data'] ?? [];
        return $produk;
    }


    
}

