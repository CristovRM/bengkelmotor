@extends('layouts.app')

@section('title', 'Struk Pembelian')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Struk Pembelian</title>
        <link rel="stylesheet" href="{{ asset('css/struk.css') }}">
    </head>
    <body>
        <div class="container mx-auto px-4 py-8">
            <div class="header">
                <h2>Struk Pembelian</h2>
                <p>Nama Kasir: {{ $transaksi['kasir'] }}</p>
            </div>
            
            <div class="transaction-info">
                <p><strong>ID Transaksi:</strong> {{ $transaksi['id'] }}</p>
                <p><strong>Tanggal:</strong> {{ $transaksi['tanggal'] }}</p>
                <p><strong>Nama Pembeli:</strong> {{ $transaksi['nama_pembeli'] }}</p>
            </div>
            
            @foreach ($transaksi['produk'] as $index => $produk)
                <div class="produk-info">
                    <p><strong>{{ $index + 1 }}. {{ $produk['nama_produk'] }}</strong></p>
                    <p>Harga: Rp {{ number_format($produk['harga'], 0, ',', '.') }}</p>
                    <p>Jumlah: {{ $produk['jumlah'] }}</p>
                    <p>Subtotal: Rp {{ number_format($produk['jumlah'] * $produk['harga'], 0, ',', '.') }}</p>
                </div>
            @endforeach
            
            <div class="transaction-info">
                <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi['total_harga'], 0, ',', '.') }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ $transaksi['payment_method'] }}</p>
                @if ($transaksi['payment_method'] === 'tunai')
                    <p><strong>Tunai:</strong> Rp {{ number_format($transaksi['jumlah_uang'], 0, ',', '.') }}</p>
                    <p><strong>Kembalian:</strong> Rp {{ number_format($transaksi['kembalian'], 0, ',', '.') }}</p>
                @endif
            </div>

            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Cetak Struk</button>

            
        </div>
    </body>
    </html>
@endsection

<script>
    function printStruk() {
        window.print();
    }
</script>

