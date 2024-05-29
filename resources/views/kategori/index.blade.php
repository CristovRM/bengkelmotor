@extends('layouts.app')

@include('dashboard')

@section('title', 'Kategori')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-bold mb-4">Daftar Kategori</h1>
        <a href="{{ route('kategori.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Kategori Baru</a>
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-100 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">id_kategori</th>
                        <th class="py-3 px-6 text-left">Nama_Kategori</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($kategori as $item)
                        <tr class="border-b border-gray-100 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $item->id }}</td>
                            <td class="py-3 px-6 text-left">{{ $item->nama_kategori }}</td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('kategori.show', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Detail</a>
                                <a href="{{ route('kategori.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline">
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


