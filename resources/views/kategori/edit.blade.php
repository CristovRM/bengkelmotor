@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="w-full max-w-md mx-auto bg-white rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold mb-4">Edit Kategori</h1>
                <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama_kategori" class="block text-gray-700 text-sm font-bold mb-2">Nama Kategori:</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg py-2 px-4 block w-full" value="{{ $kategori->nama_kategori }}">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
