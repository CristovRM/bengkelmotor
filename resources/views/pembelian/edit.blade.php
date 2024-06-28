@extends('layouts.app')

@include('dashboard')

@section('title', 'Edit Data Pembelian')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden">
            <div class="py-4 px-6">
                <h1 class="text-2xl font-bold mb-4">Edit Pembelian</h1>
                
                @if($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
                @endif

                <form action="{{ route('pembelian.update', $pembelian['id_pembelian']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama_supplier" class="block text-gray-700 text-sm font-bold mb-2">Supplier:</label>
                        <select name="nama_supplier" id="nama_supplier" class="border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg py-2 px-4 block w-full">
                            @foreach($supplier as $sup)
                                <option value="{{ $sup['nama_supplier'] }}" {{ $sup['nama_supplier'] == $pembelian['nama_supplier'] ? 'selected' : '' }}>{{ $sup['nama_supplier'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="nama_produk" class="block text-gray-700 text-sm font-bold mb-2">Produk:</label>
                        <select name="nama_produk" id="nama_produk" class="border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg py-2 px-4 block w-full">
                            @foreach($produk as $prod)
                                <option value="{{ $prod['nama_produk'] }}" {{ $prod['nama_produk'] == $pembelian['nama_produk'] ? 'selected' : '' }}>{{ $prod['nama_produk'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="jumlah" class="block text-gray-700 text-sm font-bold mb-2">Jumlah:</label>
                        <input type="number" name="jumlah" id="jumlah" class="border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg py-2 px-4 block w-full" value="{{ $pembelian['jumlah'] }}">
                    </div>
                    <div class="mb-4">
                        <label for="total_harga" class="block text-gray-700 text-sm font-bold mb-2">Total Harga:</label>
                        <input type="number" name="total_harga" id="total_harga" class="border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg py-2 px-4 block w-full" value="{{ $pembelian['total_harga'] }}">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</button>
                    <a href="{{ route('pembelian.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
