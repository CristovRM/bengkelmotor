<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'merk'=> 'required',
            'id_kategori' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->id_kategori;
        $produk->merk = $request->merk;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $request->harga_jual;
        $produk->diskon = $request->diskon;
        $produk->stok = $request->stok;

        if ($produk->save()) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil disimpan.');
        } else {
            return back()->withInput()->withErrors('Gagal menyimpan produk.');
        }
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        // Logika untuk memperbarui data produk
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
