@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-bold mb-4">Daftar Transaksi Kasir</h1>
        <a href="{{ route('kasir.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Transaksi Baru</a>
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-100 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID Transaksi</th>
                        <th class="py-3 px-6 text-left">Waktu Transaksi</th>
                        <th class="py-3 px-6 text-left">Total Harga</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($transactions as $transaction)
                        <tr class="border-b border-gray-100 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $transaction->id }}</td>
                            <td class="py-3 px-6 text-left">{{ $transaction->transaction_time }}</td>
                            <td class="py-3 px-6 text-left">{{ $transaction->total_price }}</td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('kasir.show', $transaction->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Detail</a>
                                <a href="{{ route('kasir.edit', $transaction->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('kasir.destroy', $transaction->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
