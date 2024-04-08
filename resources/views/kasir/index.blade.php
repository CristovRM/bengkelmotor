@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-bold mb-4">Daftar Transaksi Kasir</h1>
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-100 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID Transaksi</th>
                        <th class="py-3 px-6 text-left">Waktu Transaksi</th>
                        <th class="py-3 px-6 text-left">Total Harga</th>
                        <th class="py-3 px-6 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($transactions as $transaction)
                        <tr class="border-b border-gray-100 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $transaction->id }}</td>
                            <td class="py-3 px-6 text-left">{{ $transaction->created_at }}</td>
                            <td class="py-3 px-6 text-left">{{ $transaction->total_price }}</td>
                            <td class="py-3 px-6 text-left">
                                <a href="{{ route('kasir.transaction.detail', $transaction->id) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
