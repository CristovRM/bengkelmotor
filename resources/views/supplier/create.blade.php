<!-- resources/views/supplier/create.blade.php -->

@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-bold mb-4">Tambah Supplier Baru</h1>
        <form action="{{ route('supplier.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_supplier" class="block text-sm font-bold mb-2">Nama Supplier:</label>
                <input type="text" name="nama_supplier" id="nama_supplier" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-bold mb-2">Alamat:</label>
                <textarea name="alamat" id="alamat" rows="4" class="w-full px-3 py-2 border rounded" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
            <a href="{{ route('supplier.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Batal</a>
        </form>
    </div>
@endsection