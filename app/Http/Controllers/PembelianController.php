<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PembelianController extends Controller
{
    public function index()
    {
        $response = Http::timeout(5)->get('http://127.0.0.1:8000/api/pembelian');
        $pembelian = json_decode($response->body(), true)['data'] ?? [];
        return view('pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $supplier = $this->getSupplier();
        $produk = $this->getProduk();
        return view('pembelian.create', compact('supplier', 'produk'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_supplier'=> 'required',
            'nama_produk' => 'required',
            'jumlah' => 'required|numeric',
            'total_harga' => 'required|numeric',
        ]);

        $response = Http::timeout(5)->post('http://127.0.0.1:8000/api/pembelian', $validatedData);
        $data = json_decode($response->body(), true);

        if ($response->successful() && $data['status']) {
            return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil ditambahkan.');
        } else {
            return redirect()->route('pembelian.create')->withErrors(['msg' => 'Gagal menambahkan pembelian']);
        }
    }

    public function show($id)
    {
        $response = Http::timeout(5)->get("http://127.0.0.1:8000/api/pembelian/{$id}");
        $pembelian = json_decode($response->body(), true)['data'] ?? null;

        if ($response->successful() && $pembelian) {
            return view('pembelian.show', compact('pembelian'));
        } else {
            return redirect()->route('pembelian.index')->withErrors(['msg' => 'Gagal menampilkan detail pembelian']);
        }
    }

    public function edit($id)
    {
        $response = Http::timeout(5)->get("http://127.0.0.1:8000/api/pembelian/{$id}");
        $pembelian = json_decode($response->body(), true)['data'] ?? null;

        $supplier = $this->getSupplier();
        $produk = $this->getProduk();

        if ($response->successful() && $pembelian) {
            return view('pembelian.edit', compact('pembelian', 'supplier', 'produk'));
        } else {
            return redirect()->route('pembelian.index')->withErrors(['msg' => 'Gagal menampilkan form edit pembelian']);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_supplier' => 'required',
            'nama_produk' => 'required',
            'jumlah' => 'required|numeric',
            'total_harga' => 'required|numeric',
        ]);

        $response = Http::timeout(5)->put("http://127.0.0.1:8000/api/pembelian/{$id}", $validatedData);
        $data = json_decode($response->body(), true);

        if ($response->successful() && $data['status']) {
            return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil diperbarui.');
        } else {
            return redirect()->route('pembelian.edit', $id)->withErrors(['msg' => 'Gagal memperbarui pembelian']);
        }
    }

    public function destroy($id)
    {
        $response = Http::timeout(5)->delete("http://127.0.0.1:8000/api/pembelian/{$id}");
        $data = json_decode($response->body(), true);

        if ($response->successful() && $data['status']) {
            return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus.');
        } else {
            return redirect()->route('pembelian.index')->withErrors(['msg' => 'Gagal menghapus pembelian']);
        }
    }

    private function getSupplier()
    {
        $response = Http::timeout(5)->get('http://127.0.0.1:8000/api/supplier');
        $supplier = json_decode($response->body(), true)['data'] ?? [];
        return $supplier;
    }

    private function getProduk()
    {
        $response = Http::timeout(5)->get('http://127.0.0.1:8000/api/produk');
        $produk = json_decode($response->body(), true)['data'] ?? [];
        return $produk;
    }
}
