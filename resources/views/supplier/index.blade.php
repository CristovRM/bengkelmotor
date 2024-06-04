@extends('layouts.app')

@include('dashboard')

@section('title', 'Supplier')

@section('content')
    <div class="container mx-auto px-4 py-8" style="width: 800px;">
        <h1 class="text-2xl font-bold mb-4">Daftar Supplier</h1>
        <a href="{{ route('supplier.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">Tambah Supplier Baru</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-100 uppercase text-sm leading-normal">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nama Supplier</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supplier as $supplier)
                <tr>
                        <td class="border px-4 py-2">{{ $supplier->id_supplier }}</td>
                        <td class="border px-4 py-2">{{ $supplier->nama_supplier }}</td>
                        <td class="border px-4 py-2">{{ $supplier->alamat }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('supplier.show', $supplier->id_supplier) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Detail</a>
                            <a href="{{ route('supplier.edit', $supplier->id_supplier) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
