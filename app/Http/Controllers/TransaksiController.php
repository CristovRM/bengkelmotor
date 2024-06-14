<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Dompdf\Options;

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
                $transaksi = []; 
            }

            return view('transaksi.index', compact('transaksi'));
        } catch (\Exception $e) {
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
    $validatedData = $request->validate([
        'nama_pembeli' => 'required|string|max:255',
        'produk.*.nama_produk' => 'required|string|max:255',
        'produk.*.jumlah' => 'required|integer|min:1',
        'total_harga' => 'required|numeric',
        'payment_method' => 'required|string|max:255',
    ]);

    $produkData = [];

    foreach ($validatedData['produk'] as $produk) {
        try {

            logger()->debug('Request Produk:', ['nama_produk' => $produk['nama_produk']]);

            $responseProduk = Http::get('http://127.0.0.1:8000/api/produk', [
                'nama_produk' => $produk['nama_produk']
            ]);

            logger()->debug('Response Produk:', [
                'status' => $responseProduk->status(),
                'body' => $responseProduk->body()
            ]);

            if (!$responseProduk->successful()) {
                return redirect()->route('transaksi.create')->withErrors(['msg' => "Gagal mengambil data produk {$produk['nama_produk']}. " . $responseProduk->body()]);
            }

            $produkInfo = $responseProduk->json()['data'] ?? null;

            if (!$produkInfo || !isset($produkInfo[0]['id_produk'])) {
                return redirect()->route('transaksi.create')->withErrors(['msg' => "Produk {$produk['nama_produk']} tidak ditemukan."]);
            }

            $id_produk = $produkInfo[0]['id_produk'];

        
            $produkData[] = [
                'id_produk' => $id_produk,
                'jumlah' => $produk['jumlah'],
                'nama_produk' => $produk['nama_produk'],
            ];
        } catch (\Exception $e) {
            return redirect()->route('transaksi.create')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    try {
      
        $responseTransaksi = Http::post('http://127.0.0.1:8000/api/transaksi', [
            'nama_pembeli' => $validatedData['nama_pembeli'],
            'produk' => $produkData,
            'total_harga' => $validatedData['total_harga'],
            'payment_method' => $validatedData['payment_method'],
        ]);

        

        if ($responseTransaksi->successful()) {
            return redirect()->route('transaksi.index')->withSuccess('Transaksi berhasil ditambahkan.');
        } else {
            return redirect()->route('transaksi.create')->withErrors(['msg' => 'Terjadi kesalahan: ' . $responseTransaksi->body()]);
        }
    } catch (\Exception $e) {
        return redirect()->route('transaksi.create')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}

    



public function show($id)
{
    try {
        $response = Http::get("http://127.0.0.1:8000/api/transaksi/{$id}");
        $data = $response->json();

        if ($response->successful() && isset($data['status']) && $data['status']) {
            $transaksi = $data['data'];

            // Adjust the structure if necessary
            if (!isset($transaksi['produk'])) {
                $transaksi['produk'] = []; // Ensure 'produk' key exists
            }

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
        try {
            $response = Http::get('http://127.0.0.1:8000/api/produk');
            $produk = json_decode($response->body(), true)['data'] ?? [];
            return $produk;
        } catch (\Exception $e) {
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
    
                // Mengelompokkan transaksi per bulan
                $laporan = [];
                foreach ($transaksi as $item) {
                    $bulan = date('F Y', strtotime($item['created_at']));
                    if (!isset($laporan[$bulan])) {
                        $laporan[$bulan] = [
                            'total_transaksi' => 0,
                            'total_amount' => 0,
                            'transaksi' => []
                        ];
                    }
    
                    $laporan[$bulan]['total_transaksi']++;
                    $laporan[$bulan]['total_amount'] += $item['total_harga'];
                    $laporan[$bulan]['transaksi'][] = $item;
                }
    
                return view('laporan', compact('laporan'));
            } else {
                return redirect()->route('laporan')->withErrors(['msg' => 'Gagal mengambil data laporan transaksi.']);
            }
        } catch (\Exception $e) {
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

            // Render HTML menggunakan blade template 'laporan.pdf'
            $html = view('laporan.pdf', compact('transaksi'))->render();

            // Setup Dompdf
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);

            $dompdf = new Dompdf($options);

            // Load HTML ke Dompdf
            $dompdf->loadHtml($html);

            // Render PDF (menghasilkan file PDF)
            $dompdf->render();

            // Simpan PDF ke direktori lokal
            $outputFilename = storage_path('app/public/laporan_transaksi.pdf');
            $dompdf->stream($outputFilename);

            return $outputFilename;
        } else {
            return redirect()->route('laporan')->withErrors(['msg' => 'Gagal mengambil data laporan transaksi.']);
        }
    } catch (\Exception $e) {
        return redirect()->route('laporan')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}




public function cetak($id)
{
    try {
        $response = Http::get("http://127.0.0.1:8000/api/transaksi/{$id}");
        $data = $response->json();

        if ($response->successful() && isset($data['status']) && $data['status']) {
            $transaksi = $data['data'];

            
            if (!isset($transaksi['produk'])) {
                $transaksi['produk'] = []; 
            }

            $transaksi['kasir'] = Auth::user()->name;

            $transaksi['tanggal'] = isset($transaksi['created_at']) ? date('d F Y H:i:s', strtotime($transaksi['created_at'])) : 'Tanggal tidak tersedia';
            return view('transaksi.cetak', compact('transaksi'));
        } else {
            return redirect()->route('transaksi.index')->withErrors(['msg' => 'Transaksi tidak ditemukan.']);
        }
    } catch (\Exception $e) {
        return redirect()->route('transaksi.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}

}