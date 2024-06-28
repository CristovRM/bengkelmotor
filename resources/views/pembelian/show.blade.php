@extends('layouts.app')

@include('dashboard')

@section('title', 'Detail Pembelian')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden">
            <div class="py-4 px-6">
                <h1 class="text-2xl font-bold mb-4">Detail Pembelian</h1>
                <table class="table-auto w-full">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <td class="px-4 py-2">{{ $pembelian['id_pembelian'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2">Supplier</th>
                        <td class="px-4 py-2">{{ $pembelian['nama_supplier'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2">Produk</th>
                        <td class="px-4 py-2">{{ $pembelian['nama_produk'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2">Jumlah</th>
                        <td class="px-4 py-2">{{ $pembelian['jumlah'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2">Total Harga</th>
                        <td class="px-4 py-2">{{ $pembelian['total_harga'] }}</td>
                    </tr>
                </table>
                <a href="{{ route('pembelian.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4">Kembali</a>
            </div>
        </div>
    </div>
@endsection
