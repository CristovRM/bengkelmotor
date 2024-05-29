<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('produk')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('transaksi.create', compact('produk'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_produk' => 'required',
        'jumlah' => 'required|integer|min:1',
        'total_harga' => 'required|numeric',
    ]);

    // Ambil produk berdasarkan ID
    $produk = Produk::findOrFail($request->id_produk);

    // Periksa apakah stok cukup untuk transaksi
    if ($produk->stok < $request->jumlah) {
        return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
    }

    // Kurangi stok produk
    $produk->stok -= $request->jumlah;
    $produk->save();

    // Buat transaksi baru
    Transaksi::create([
        'id_produk' => $request->id_produk,
        'jumlah' => $request->jumlah,
        'total_harga' => $request->total_harga,
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
}

public function edit($id)
{
    $transaksi = Transaksi::find($id);
    $produk = Produk::all(); // Assuming you have a Produk model to fetch the products

    return view('transaksi.edit', compact('transaksi', 'produk'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'id_produk' => 'required|exists:produk,id',
        'jumlah' => 'required|integer',
        'total_harga' => 'required|numeric',
    ]);

    $transaksi = Transaksi::find($id);
    $transaksi->id_produk = $request->id_produk;
    $transaksi->jumlah = $request->jumlah;
    $transaksi->total_harga = $request->total_harga;
    $transaksi->save();

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
}
}