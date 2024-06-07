@extends('layouts.app')

@include('dashboard')

@section('title', 'Member')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Daftar Member</h1>
    
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

    <a href="{{ route('member.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Member Baru</a>
    
    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Telepon</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($member as $member)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $member['id_member'] }}</td>
                        <td class="py-3 px-6 text-left">{{ $member['name'] }}</td>
                        <td class="py-3 px-6 text-left">{{ $member['email'] }}</td>
                        <td class="py-3 px-6 text-left">{{ $member['phone'] }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('member.show', $member['id_member']) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Detail</a>
                            <a href="{{ route('member.edit', $member['id_member']) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('member.destroy', $member['id_member']) }}" method="POST" style="display:inline">
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
