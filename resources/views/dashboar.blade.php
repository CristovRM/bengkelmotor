@extends('layouts.app')

@include('dashboard')

@section('content')
       <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="p-4 bg-white shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-2">Total Users</h2>
                <p class="text-2xl">{{ $totalUsers }}</p>
                <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-1 py-1 rounded-md hover:bg-blue-600"><i class="fas fa-info-circle"></i></a>
            </div>
            <div class="p-4 bg-white shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-2">Total Karyawan</h2>
                <p class="text-2xl">{{ $totalKaryawan }}</p>
                <a href="{{ route('karyawan.index') }}" class="bg-blue-500 text-white px-1 py-1 rounded-md hover:bg-blue-600"><i class="fas fa-info-circle"></i></a>
            </div>
            <div class="p-4 bg-white shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-2">Total Kategori</h2>
                <p class="text-2xl">{{ $totalKategori }}</p>
                <a href="{{ route('kategori.index') }}" class="bg-blue-500 text-white px-1 py-1 rounded-md hover:bg-blue-600"><i class="fas fa-info-circle"></i></a>
            </div>
            <div class="p-4 bg-white shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-2">Total Produk</h2>
                <p class="text-2xl">{{ $totalProduk }}</p>
                <a href="{{ route('produk.index') }}" class="bg-blue-500 text-white px-1 py-1 rounded-md hover:bg-blue-600"><i class="fas fa-info-circle"></i></a>
            </div>
            <div class="p-4 bg-white shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-2">Total Supplier</h2>
                <p class="text-2xl">{{ $totalSupplier }}</p>
                <a href="{{ route('supplier.index') }}" class="bg-blue-500 text-white px-1 py-1 rounded-md hover:bg-blue-600"><i class="fas fa-info-circle"></i></a>
            </div>
            <div class="p-4 bg-white shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-2">Total Pembelian</h2>
                <p class="text-2xl">{{ $totalPembelian }}</p>
                <a href="{{ route('pembelian.index') }}" class="bg-blue-500 text-white px-1 py-1 rounded-md hover:bg-blue-600"><i class="fas fa-info-circle"></i></a>
            </div>
            <div class="p-4 bg-white shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-2">Laporan Transaksi</h2>
                <p class="text-2xl">{{ $laporanTransaksi }}</p>
                <a href="{{ route('laporan') }}" class="bg-blue-500 text-white px-1 py-1 rounded-md hover:bg-blue-600"><i class="fas fa-info-circle"></i></a>
            </div>
        </div>
    </div>
@endsection
