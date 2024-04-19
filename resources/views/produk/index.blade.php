@extends('layouts.app')

@include('dashboard')

@section('title', 'Produk')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
        <a href="{{ route('produk.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Produk Baru</a>
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-100 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Kode</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Kategori</th>
                        <th class="py-3 px-6 text-left">ID Supplier</th>
                        <th class="py-3 px-6 text-left">Merk</th>
                        <th class="py-3 px-6 text-left">Harga Beli</th>
                        <th class="py-3 px-6 text-left">Harga Jual</th>
                        <th class="py-3 px-6 text-left">Diskon</th>
                        <th class="py-3 px-6 text-left">Stok</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($produk as $item)
                        <tr class="border-b border-gray-100 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $item->id_produk }}</td>
                            <td class="py-3 px-6 text-left">{{ $item->nama_produk }}</td>
                            <td class="py-3 px-6 text-left">{{ $item->kategori->nama_kategori }}</td>
                            <td class="py-3 px-6 text-left">{{ optional($item->supplier)->id_supplier }}</td>
                            <td class="py-3 px-6 text-left">{{ $item->merk }}</td>
                            <td class="py-3 px-6 text-left">{{ $item->harga_beli }}</td>
                            <td class="py-3 px-6 text-left">{{ $item->harga_jual }}</td>
                            <td class="py-3 px-6 text-left">{{ $item->diskon }}</td>
                            <td class="py-3 px-6 text-left">{{ $item->stok }}</td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('produk.show', $item->id_produk) }}" class="mr-2 text-blue-600 hover:text-blue-900">Detail</a>
                                <a href="{{ route('produk.edit', $item->id_produk) }}" class="mr-2 text-indigo-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('produk.destroy', $item->id_produk) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
