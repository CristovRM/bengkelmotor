<!-- resources/views/produk/create.blade.php -->

@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-bold mb-4">Tambah Produk Baru</h1>
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_produk" class="block text-sm font-bold mb-2">Nama Produk:</label>
                <input type="text" name="nama_produk" id="nama_produk" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="id_kategori" class="block text-sm font-bold mb-2">Kategori:</label>
                <select name="id_kategori" id="id_kategori" class="w-full px-3 py-2 border rounded" required>
                    @foreach($kategori as $kategori)
                        <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                 <label for="id_supplier" class="block text-sm font-bold mb-2">ID Supplier:</label>
                 <select name="id_supplier" id="id_supplier" class="w-full px-3 py-2 border rounded" required>
                    @foreach($supplier as $supplier)
                        <option value="{{ $supplier->id_supplier }}">{{ $supplier->id_supplier }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="merk" class="block text-sm font-bold mb-2">Merk:</label>
                <input type="text" name="merk" id="merk" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="harga_beli" class="block text-sm font-bold mb-2">Harga Beli:</label>
                <input type="text" name="harga_beli" id="harga_beli" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="harga_jual" class="block text-sm font-bold mb-2">Harga Jual:</label>
                <input type="text" name="harga_jual" id="harga_jual" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="diskon" class="block text-sm font-bold mb-2">Diskon:</label>
                <input type="number" name="diskon" id="diskon" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="stok" class="block text-sm font-bold mb-2">Stok:</label>
                <input type="number" name="stok" id="stok" class="w-full px-3 py-2 border rounded" required value="0">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
            <a href="{{ route('produk.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Batal</a>
        </form>
    </div>
@endsection
