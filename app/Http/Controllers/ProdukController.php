<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Supplier;

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
        $supplier = Supplier::all();
        return view('produk.create', compact('kategori', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'merk' => 'required',
            'id' => 'required',
            'id_supplier' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'diskon' => 'required',
            'stok' => 'required',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil disimpan.');
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
        $supplier = Supplier::all();
        return view('produk.edit', compact('produk', 'kategori', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'merk' => 'required',
            'id' => 'required',
            'id_supplier' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'diskon' => 'required',
            'stok' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
