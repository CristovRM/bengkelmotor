@extends('layouts.app')

@include('kasir.dashboard')

@section('title', 'Kasir')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Transaksi Kasir</h1>
    <a href="{{ route('transaksi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah Transaksi</a>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto mt-6">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="w-full bg-gray-200 text-left text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-4 border-b border-gray-300">ID</th>
                    <th class="py-3 px-4 border-b border-gray-300">Nama Produk</th>
                    <th class="py-3 px-4 border-b border-gray-300">Jumlah</th>
                    <th class="py-3 px-4 border-b border-gray-300">Total Harga</th>
                    <th class="py-3 px-4 border-b border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($transaksi as $trx)
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-4 border-b border-gray-300">{{ $trx->id }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $trx->produk->nama_produk }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ number_format($trx->jumlah, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">Rp {{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">
                            <a href="{{ route('transaksi.edit', $trx->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">Edit</a>
                            <form action="{{ route('transaksi.destroy', $trx->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
