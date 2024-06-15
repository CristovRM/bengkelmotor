@extends('layouts.app')

@include('dashboard')

@section('title', 'Detail Produk')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Detail Produk</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Nama Produk:</label>
        <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ $produk['nama_produk'] }}</p>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Kategori:</label>
        <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ $produk['nama_kategori'] }}</p>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Supplier:</label>
        <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ $produk['nama_supplier'] }}</p>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Harga Beli:</label>
        <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ $produk['harga_beli'] }}</p>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Harga Jual:</label>
        <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ $produk['harga_jual'] }}</p>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Stok:</label>
        <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ $produk['stok'] }}</p>
    </div>
    <div class="flex items-center justify-between">
        <a href="{{ route('produk.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Kembali ke Daftar Produk
        </a>
        
    </div>
</div>
@endsection
