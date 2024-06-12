<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/transaksi');
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $transaksi = $data['data'];
            } else {
                Log::warning('Failed to fetch transactions', ['response' => $response->body()]);
                $transaksi = []; 
            }

            return view('transaksi.index', compact('transaksi'));

        } catch (\Exception $e) {
            Log::error('Error fetching transactions: ' . $e->getMessage());
            $transaksi = [];
            return view('transaksi.index', compact('transaksi'))->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        $produk = $this->getProduk();
        return view('transaksi.create', compact('produk'));
    }

    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'nama_pembeli' => 'required',
            'nama_produk' => 'required',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
            'payment_method' => 'required',
        ]);

        $responseProduk = Http::get('http://127.0.0.1:8000/api/produk', [
            'nama_produk' => $validatedData['nama_produk']
        ]);
        $produkData = json_decode($responseProduk->body(), true)['data'] ?? [];

        if (!$responseProduk->successful() || empty($produkData)) {
            Log::warning('Failed to fetch product details', ['response' => $responseProduk->body()]);
            return redirect()->route('transaksi.create')->withErrors(['msg' => 'Produk tidak tersedia.']);
        }

        $stok = $produkData['stok'] ?? 0;

        if ($stok < $validatedData['jumlah']) {
            Log::warning('Stok produk tidak mencukupi', ['response' => $responseProduk->body()]);
            return redirect()->route('transaksi.create')->withErrors(['msg' => "Stok produk tidak mencukupi. Hanya tersedia {$stok} unit."]);
        }

        $responseUpdateStok = Http::put('http://127.0.0.1:8000/api/produk', [
            'nama_produk' => $validatedData['nama_produk'],
            'stok' => $stok - $validatedData['jumlah']
        ]);

        if (!$responseUpdateStok->successful()) {
            Log::warning('Failed to update stock', ['response' => $responseUpdateStok->body()]);
            return redirect()->route('transaksi.create')->withErrors(['msg' => 'Gagal mengupdate stok produk.']);
        }

        $responseAddTransaksi = Http::post('http://127.0.0.1:8000/api/transaksi', $validatedData);

        if ($responseAddTransaksi->successful()) {
            return redirect()->route('transaksi.index')->withSuccess('Transaksi berhasil ditambahkan.');
        } else {
            Log::warning('Failed to add transaksi', ['response' => $responseAddTransaksi->body()]);
            return redirect()->route('transaksi.create')->withErrors(['msg' => 'Terjadi kesalahan: ' . $responseAddTransaksi->body()]);
        }
    } catch (\Exception $e) {
        Log::error('Error adding transaksi: ' . $e->getMessage());
        return redirect()->route('transaksi.create')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
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
                Log::warning('Transaction not found', ['response' => $response->body()]);
                return redirect()->route('transaksi.index')->withErrors(['msg' => 'Transaksi tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            Log::error('Error fetching transaksi: ' . $e->getMessage());
            return redirect()->route('transaksi.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    private function getProduk()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/produk');
            $produk = json_decode($response->body(), true)['data'] ?? [];
            return $produk;
        } catch (\Exception $e) {
            Log::error('Error fetching products: ' . $e->getMessage());
            return [];
        }
    }

    public function laporan()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/transaksi');
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $transaksi = $data['data'];
                
                $totalTransaksi = count($transaksi);
                $totalAmount = array_sum(array_column($transaksi, 'total_harga'));
                
                return view('laporan', compact('transaksi', 'totalTransaksi', 'totalAmount'));
            } else {
                Log::warning('Failed to fetch report', ['response' => $response->body()]);
                return redirect()->route('laporan')->withErrors(['msg' => 'Gagal mengambil data laporan transaksi.']);
            }
        } catch (\Exception $e) {
            Log::error('Error fetching report: ' . $e->getMessage());
            return redirect()->route('laporan')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function laporanPDF()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/transaksi');
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $transaksi = $data['data'];
                $pdf = new Dompdf();
                $pdf->loadHtml(view('laporan.pdf', compact('transaksi'))->render());
                $pdf->setPaper('A4', 'landscape');
                $pdf->render();

                return $pdf->stream('laporan_transaksi.pdf');
            } else {
                Log::warning('Failed to fetch report for PDF', ['response' => $response->body()]);
                return redirect()->route('laporan')->withErrors(['msg' => 'Gagal mengambil data laporan transaksi.']);
            }
        } catch (\Exception $e) {
            Log::error('Error generating PDF report: ' . $e->getMessage());
            return redirect()->route('laporan')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
