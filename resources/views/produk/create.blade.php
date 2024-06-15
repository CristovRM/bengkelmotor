@extends('layouts.app')

@include('dashboard')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Tambah Produk Baru</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_produk" class="block text-gray-700 font-bold mb-2">Nama Produk:</label>
            <input type="text" id="nama_produk" name="nama_produk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="nama_kategori" class="block text-gray-700 font-bold mb-2">Kategori:</label>
            <select id="nama_kategori" name="nama_kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($kategori as $kategori)
                    <option value="{{ $kategori['nama_kategori'] }}">{{ $kategori['nama_kategori'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="nama_supplier" class="block text-gray-700 font-bold mb-2">Supplier:</label>
            <select id="nama_supplier" name="nama_supplier" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($supplier as $supplier)
                    <option value="{{ $supplier['nama_supplier'] }}">{{ $supplier['nama_supplier'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="harga_beli" class="block text-gray-700 font-bold mb-2">Harga Beli:</label>
            <input type="number" id="harga_beli" name="harga_beli" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="harga_jual" class="block text-gray-700 font-bold mb-2">Harga Jual:</label>
            <input type="number" id="harga_jual" name="harga_jual" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="stok" class="block text-gray-700 font-bold mb-2">Stok:</label>
            <input type="number" id="stok" name="stok" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
            <a href="{{ route('produk.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Kembali ke Daftar Produk
            </a>
        </div>
    </form>
</div>
@endsection
