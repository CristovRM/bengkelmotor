@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden">
            <div class="py-4 px-6">
                <h1 class="text-2xl font-bold mb-4">Detail Kategori</h1>
                <div>
                    <p><strong>ID Kategori:{{ $kategori->id_kategori }}</p></strong>
                    <p><strong>Nama Kategori:{{ $kategori->nama_kategori }}</p></strong>
                </div>
                <a href="{{ route('kategori.index') }}" class="block text-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
