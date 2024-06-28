@extends('layouts.app')

@include('dashboard')

@section('title', 'Daftar Pembelian')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg overflow-hidden">
            <div class="py-4 px-6">
                <h1 class="text-2xl font-bold mb-4">Daftar Pembelian</h1>
                <a href="{{ route('pembelian.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Tambah Pembelian</a>
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Supplier</th>
                            <th class="px-4 py-2">Produk</th>
                            <th class="px-4 py-2">Jumlah</th>
                            <th class="px-4 py-2">Total Harga</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelian as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item['id_pembelian'] }}</td>
                            <td class="border px-4 py-2">{{ $item['nama_supplier'] }}</td>
                            <td class="border px-4 py-2">{{ $item['nama_produk'] }}</td>
                            <td class="border px-4 py-2">{{ $item['jumlah'] }}</td>
                            <td class="border px-4 py-2">{{ $item['total_harga'] }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('pembelian.show', $item['id_pembelian']) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"><i class="fas fa-info-circle"></i></a>
                                <a href="{{ route('pembelian.edit', $item['id_pembelian']) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('pembelian.destroy', $item['id_pembelian']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
