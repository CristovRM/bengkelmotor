<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdukController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/produk');
        $produk = $response->json();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {

        return view('produk.create', compact('kategori', 'supplier'));
    }

    public function store(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/produk', $request->all());
        $data = $response->json();

        if ($response->successful() && $data['status']) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil disimpan.');
        } else {
            return redirect()->route('produk.index')->withErrors(['msg' => 'Gagal menyimpan produk.']);
        }
    }

    public function show($id)
    {
        $response = Http::get("http://127.0.0.1:8000/api/produk/{$id}");
        $produk = $response->json();

        if ($response->successful() && $produk['status']) {
            return view('produk.show', compact('produk'));
        } else {
            return redirect()->route('produk.index')->withErrors(['msg' => 'Produk tidak ditemukan.']);
        }
    }

    public function edit($id)
    {
        $responseProduk = Http::get("http://127.0.0.1:8000/api/produk/{$id}");
        $produk = $responseProduk->json();

        if ($responseProduk->successful() && $produk['status']) {
            return view('produk.edit', compact('produk', 'kategori', 'supplier'));
        } else {
            return redirect()->route('produk.index')->withErrors(['msg' => 'Produk tidak ditemukan.']);
        }
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/produk/{$id}", $request->all());
        $data = $response->json();

        if ($response->successful() && $data['status']) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
        } else {
            return redirect()->route('produk.edit', $id)->withErrors(['msg' => 'Gagal memperbarui produk.']);
        }
    }

    public function destroy($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/produk/{$id}");
        $data = $response->json();

        if ($response->successful() && $data['status']) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        } else {
            return redirect()->route('produk.index')->withErrors(['msg' => 'Gagal menghapus produk.']);
        }
    }
}
