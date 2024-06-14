@extends('layouts.app')

@include('kasir.dashboard')

@section('title', 'Detail Transaksi')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Detail Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('msg') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded p-6">
        <h2 class="text-xl font-semibold mb-4">Informasi Pembeli</h2>
        <p><strong>Nama Pembeli:</strong> {{ $transaksi['nama_pembeli'] }}</p>
        <p><strong>Nama Produk:</strong> {{ $transaksi['nama_produk'] }}</p>
        <p><strong>Jumlah:</strong> {{ $transaksi['jumlah'] }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $transaksi['payment_method'] }}</p>
        <h2 class="text-xl font-semibold my-4">Total Harga</h2>
        <p class="text-lg"><strong>Rp {{ number_format($transaksi['total_harga'], 0, ',', '.') }}</strong></p>

        <a href="{{ route('transaksi.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Kembali ke transaksi

        </a>
    </div>
</div>
@endsection
