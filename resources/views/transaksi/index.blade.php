@extends('layouts.app')

@include('kasir.dashboard')

@section('title', 'Daftar Transaksi Kasir')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Daftar Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('msg') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('transaksi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah Transaksi</a>

    <div class="overflow-x-auto mt-6">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="w-full bg-gray-200 text-left text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-4 border-b border-gray-300">ID</th>
                    <th class="py-3 px-4 border-b border-gray-300">Nama Pembeli</th>
                    <th class="py-3 px-4 border-b border-gray-300">Nama Produk</th>
                    <th class="py-3 px-4 border-b border-gray-300">Jumlah</th>
                    <th class="py-3 px-4 border-b border-gray-300">Total Harga</th>
                    <th class="py-3 px-4 border-b border-gray-300">Metode Pembayaran</th>
                    <th class="py-3 px-4 border-b border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($transaksi as $trx)
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-4 border-b border-gray-300">{{ $trx['id'] }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $trx['nama_pembeli'] }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $trx['nama_produk'] }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ number_format($trx['jumlah']) }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">Rp {{ number_format($trx['total_harga'], 0, ',', '.') }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $trx['payment_method'] }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">
                            <a href="{{ route('transaksi.show', $trx['id']) }}" class="bg-blue-500 text-white px-1 py-1 rounded-md hover:bg-blue-600"><i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('transaksi.cetak', $trx['id']) }}" class="bg-green-500 text-white px-1 py-1 rounded-md hover:bg-green-600"><i class="fas fa-print"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

