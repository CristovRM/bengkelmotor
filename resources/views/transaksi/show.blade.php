@extends('layouts.app')

@include('kasir.dashboard')

@section('title', 'Detail Transaksi')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Detail Transaksi</h1>
    <a href="{{ route('transaksi.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali</a>

    <div class="mt-6 bg-white p-6 rounded-lg shadow-md border border-gray-300">
        <h2 class="text-xl font-semibold mb-4">ID Transaksi: {{ $transaksi->id }}</h2>
        <p class="text-lg mb-2"><strong>Nama Pembeli:</strong> {{ $transaksi->nama_pembeli }}</p>
        <p class="text-lg mb-2"><strong>Nama Produk:</strong> {{ $transaksi->produk->nama_produk }}</p>
        <p class="text-lg mb-2"><strong>Jumlah:</strong> {{ number_format($transaksi->jumlah, 0, ',', '.') }}</p>
        <p class="text-lg mb-2"><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
    </div>
</div>
@endsection
