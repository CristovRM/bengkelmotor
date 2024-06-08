<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdukController extends Controller
{
    public function index()
    {
        $response = Http::timeout(5)->get('http://127.0.0.1:8000/api/produk');
        $produk = json_decode($response->body(), true)['data'] ?? [];
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $supplier = $this->getSupplier();
        $kategori = $this->getKategori();
        return view('produk.create', compact('supplier' , 'kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'nama_supplier' => 'required',
            'nama_produk' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',          
            'stok' => 'required|numeric',
        ]);

        $response = Http::timeout(5)->post('http://127.0.0.1:8000/api/produk', $validatedData);
        $data = json_decode($response->body(), true);

        if ($response->successful() && $data['status']) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
        } else {
            return redirect()->route('produk.create')->withErrors(['msg' => 'Gagal menambahkan produk']);
        }
    }

    public function show($id)
    {
        $response = Http::timeout(5)->get("http://127.0.0.1:8000/api/produk/{$id}");
        $produk = json_decode($response->body(), true)['data'] ?? null;

        if ($response->successful() && $produk) {
            return view('produk.show', compact('produk'));
        } else {
            return redirect()->route('produk.index')->withErrors(['msg' => 'Gagal menampilkan detail produk']);
        }
    }

    public function edit($id)
    {
        $response = Http::timeout(5)->get("http://127.0.0.1:8000/api/produk/{$id}");
        $produk = json_decode($response->body(), true)['data'] ?? null;

        $supplier = $this->getSupplier();
        $kategori = $this->getKategori();

        if ($response->successful() && $produk) {
            return view('produk.edit', compact('produk', 'supplier', 'kategori'));
        } else {
            return redirect()->route('produk.index')->withErrors(['msg' => 'Gagal menampilkan form edit produk']);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'nama_supplier' => 'required',
            'nama_produk' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',          
            'stok' => 'required|numeric',
        ]);

        $response = Http::timeout(5)->put("http://127.0.0.1:8000/api/produk/{$id}", $validatedData);
        $data = json_decode($response->body(), true);

        if ($response->successful() && $data['status']) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
        } else {
            return redirect()->route('produk.edit', $id)->withErrors(['msg' => 'Gagal memperbarui produk']);
        }
    }

    public function destroy($id)
    {
        $response = Http::timeout(5)->delete("http://127.0.0.1:8000/api/produk/{$id}");
        $data = json_decode($response->body(), true);

        if ($response->successful() && $data['status']) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        } else {
            return redirect()->route('produk.index')->withErrors(['msg' => 'Gagal menghapus produk']);
        }
    }

    private function getSupplier()
    {
        $response = Http::timeout(5)->get('http://127.0.0.1:8000/api/supplier');
        $supplier = json_decode($response->body(), true)['data'] ?? [];
        return $supplier;
    }

    private function getKategori()
    {
        $response = Http::timeout(5)->get('http://127.0.0.1:8000/api/kategori');
        $kategori = json_decode($response->body(), true)['data'] ?? [];
        return $kategori;
    }
}
