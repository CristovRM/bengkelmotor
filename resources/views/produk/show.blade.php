<!-- resources/views/produk/show.blade.php -->

@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-bold mb-4">Detail Produk</h1>
        <div class="mb-4">
            <p><strong>Nama Produk:</strong> {{ $produk->nama_produk }}</p>
            <p><strong>Kategori:</strong> {{ $produk->kategori->nama_kategori }}</p>
            <strong>Merk:</strong> {{ $produk->merk }}</p>
            <p><strong>Harga Beli:</strong> {{ $produk->harga_beli }}</p>
            <p><strong>Harga Jual:</strong> {{ $produk->harga_jual }}</p>
            <p><strong>Diskon:</strong> {{ $produk->diskon }}</p>
            <p><strong>Stok:</strong> {{ $produk->stok }}</p>
        </div>
        <a href="{{ route('produk.index') }}" class="bg-blue-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded">Kembali</a>
    </div>
@endsection
