@extends('layouts.app')

@include('dashboard')

@section('title', 'Detail Supplier')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-bold mb-4">Detail Supplier</h1>
        <div class="mb-4">
            <strong>Nama Supplier:</strong> {{ $supplier['nama_supplier'] }}
        </div>
        <div class="mb-4">
            <strong>Alamat:</strong> {{ $supplier['alamat'] }}
        </div>
        <div class="mb-4">
            <strong>Nomor Kontak:</strong> {{ $supplier['no_kontak'] }}
        </div>
        <a href="{{ route('supplier.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Kembali ke daftar Supplier
        </a>
    </div>
@endsection
