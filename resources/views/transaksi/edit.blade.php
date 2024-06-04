@extends('layouts.app')

@section('title', 'Edit Transaksi')

@include('kasir.dashboard')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Edit Transaksi</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="id_produk" class="block text-gray-700">Nama Produk:</label>
            <select name="produk_id" id="produk_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                @foreach ($produk as $item)
                    <option value="{{ $item->id_produk }}" {{ $transaksi->id_produk == $item->id ? 'selected' : '' }}>{{ $item->nama_produk }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlah" class="block text-gray-700">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ $transaksi->jumlah }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="total_harga" class="block text-gray-700">Total Harga:</label>
            <input type="text" name="total_harga" id="total_harga" value="{{ $transaksi->total_harga }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('transaksi.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Batal</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ml-4">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
