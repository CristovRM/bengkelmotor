@extends('layouts.app')

@include('dashboard')

@section('title', 'Detail Produk')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Detail Produk</h1>
    <div>
        <p><strong>Nama Produk:</strong> {{ $produk->nama_produk }}</p>
        @if ($produk->kategori)
            <p><strong>Kategori:</strong> {{ $produk->kategori->nama_kategori }}</p>
        @else
            <p><strong>Kategori:</strong> Tidak Ada</p>
        @endif
        <p><strong>Merk:</strong> {{ $produk->merk }}</p>
        <p><strong>Harga Beli:</strong> {{ $produk->harga_beli }}</p>
        <p><strong>Harga Jual:</strong> {{ $produk->harga_jual }}</p>
        <p><strong>Diskon:</strong> {{ $produk->diskon }}</p>
        <p><strong>Stok:</strong> {{ $produk->stok }}</p>
        @if ($produk->supplier)
            <p><strong>Nama Supplier:</strong> {{ $produk->supplier->nama_supplier }}</p>
        @endif
    </div>
    <a href="{{ route('produk.index') }}" class="block text-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mt-1">Kembali</a>
</div>
