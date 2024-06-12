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

    <div class="bg-white p-6 rounded-md shadow-md">
        <p><strong>ID:</strong> {{ $transaksi['id'] }}</p>
        <p><strong>Nama Pembeli:</strong> {{ $transaksi['nama_pembeli'] }}</p>
        <p><strong>Nama Produk:</strong> {{ $transaksi['nama_produk'] }}</p>
        <p><strong>Jumlah:</strong> {{ number_format($transaksi['jumlah'], 0, ',', '.') }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi['total_harga'], 0, ',', '.') }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $transaksi['payment_method'] }}</p>
        <a href="{{ route('transaksi.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-4 inline-block">
            Kembali ke Daftar Transaksi
        </a>
    </div>
</div>
@endsection
