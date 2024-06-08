@extends('layouts.app')

@include('dashboard')

@section('title', 'Detail Kategori')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
                <h1 class="text-2xl font-bold mb-4">Detail Kategori</h1>
                <div>
                    <p><strong>ID Kategori:{{ $kategori['id'] }}</p></strong>
                    <p><strong>Nama Kategori:{{ $kategori['nama_kategori'] }}</p></strong>
                </div>
                <a href="{{ route('kategori.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Kembali ke daftar Kategori
                </a>   
    </div>
@endsection