<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use Dompdf\Dompdf;
use Dompdf\Options;


class TransaksiController extends Controller
{    

    public function laporanPDF()
{
    $transaksi = Transaksi::with('kasir')->get();

    $pdf = new Dompdf();
    $pdf->loadHtml(view('laporan', compact('transaksi')));


    // (Opsional) Set paper size dan orientation
    $pdf->setPaper('A4', 'landscape');

    // Render PDF ke output
    $pdf->render();

    // Tampilkan atau unduh PDF
    return $pdf->stream('laporan_transaksi.pdf');
}
    public function laporan()
    {
        // Ambil data transaksi dari database
        $transaksi = Transaksi::all(); // Atau sesuaikan dengan logika Anda

        // Tampilkan halaman laporan transaksi
        return view('laporan', compact('transaksi'));
    }
    
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
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
        ]);

        $userid = auth()->id();
    
       $userRole = auth()->user()->role;

        $produk = Produk::findOrFail($request->id_produk);

        if ($produk->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
        }

        // Debugging statements
        \Log::info('Stok sebelum pengurangan: ' . $produk->stok);
        \Log::info('Jumlah yang diinputkan: ' . $request->jumlah);

        // Pengurangan stok sesuai dengan jumlah yang diinputkan
        $produk->stok -= $request->jumlah;
        $produk->save();

        // Debugging statements
        \Log::info('Stok setelah pengurangan: ' . $produk->stok);

        Transaksi::create([
            'id_produk' => $request->id_produk,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $produk = Produk::all();
        return view('transaksi.edit', compact('transaksi', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $produkLama = Produk::findOrFail($transaksi->id_produk);
        $produkBaru = Produk::findOrFail($request->id_produk);

        // Debugging statements
        \Log::info('Stok produk lama sebelum pengembalian: ' . $produkLama->stok);
        \Log::info('Jumlah yang diinputkan: ' . $request->jumlah);
        \Log::info('Jumlah transaksi sebelumnya: ' . $transaksi->jumlah);

        // Kembalikan stok produk lama
        $produkLama->stok += $transaksi->jumlah;
        $produkLama->save();

        // Debugging statements
        \Log::info('Stok produk lama setelah pengembalian: ' . $produkLama->stok);

        if ($produkBaru->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
        }

        // Debugging statements
        \Log::info('Stok produk baru sebelum pengurangan: ' . $produkBaru->stok);

        // Kurangi stok produk baru
        $produkBaru->stok -= $request->jumlah;
        $produkBaru->save();

        // Debugging statements
        \Log::info('Stok produk baru setelah pengurangan: ' . $produkBaru->stok);

        $transaksi->id_produk = $request->id_produk;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $produk = Produk::findOrFail($transaksi->id_produk);

        // Debugging statements
        \Log::info('Stok sebelum pengembalian: ' . $produk->stok);
        \Log::info('Jumlah transaksi: ' . $transaksi->jumlah);

        // Kembalikan stok produk
        $produk->stok += $transaksi->jumlah;
        $produk->save();

        // Debugging statements
        \Log::info('Stok setelah pengembalian: ' . $produk->stok);

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
