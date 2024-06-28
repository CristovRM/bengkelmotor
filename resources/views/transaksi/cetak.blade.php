@extends('layouts.app')

@section('title', 'Struk Pembelian')

@section('content')
<div class="container mx-auto px-4 py-8" style="max-width: 400px; border: 1px solid #000; padding: 20px; font-family: 'Courier New', Courier, monospace;">
    <div class="header text-center mb-4">
        <h2 class="text-lg font-bold">Struk Pembelian</h2>
        <p><strong>Bengkel Motor L Sitohang</strong></p>
        <p>Nama Kasir: {{ $transaksi['kasir'] }}</p>
    </div>
    
    <div class="transaction-info mb-4">
        <p><strong>ID Transaksi:</strong> {{ $transaksi['id'] }}</p>
        <p><strong>Tanggal:</strong> {{ $transaksi['tanggal'] }}</p>
        <p><strong>Nama Pembeli:</strong> {{ $transaksi['nama_pembeli'] }}</p>
    </div>
    
    <table class="w-full mb-4">
        <thead>
            <tr>
                <th class="border-b text-left pb-2">Produk</th>
                <th class="border-b text-right pb-2">Jumlah</th>
                <th class="border-b text-right pb-2">Harga</th>
                <th class="border-b text-right pb-2">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi['produk'] as $index => $produk)
                <tr>
                    <td class="pt-2">{{ $produk['nama_produk'] }}</td>
                    <td class="pt-2 text-right">{{ $produk['jumlah'] }}</td>
                    <td class="pt-2 text-right">Rp {{ number_format($produk['harga'], 0, ',', '.') }}</td>
                    <td class="pt-2 text-right">Rp {{ number_format($produk['jumlah'] * $produk['harga'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="transaction-info">
        <p class="text-right"><strong>Total Harga:</strong> Rp {{ number_format($transaksi['total_harga'], 0, ',', '.') }}</p>
        <p class="text-right"><strong>Metode Pembayaran:</strong> {{ ucfirst($transaksi['payment_method']) }}</p>
        @if ($transaksi['payment_method'] === 'tunai')
            <p class="text-right"><strong>Tunai:</strong> Rp {{ number_format($transaksi['jumlah_uang'], 0, ',', '.') }}</p>
            <p class="text-right"><strong>Kembalian:</strong> Rp {{ number_format($transaksi['kembalian'], 0, ',', '.') }}</p>
        @endif
    </div>

    <div class="text-center mt-4">
        <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Cetak Struk</button>
    </div>
</div>
@endsection
