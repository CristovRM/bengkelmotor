<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')

@include('dashboard')

@section('title', 'User')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-3xl font-bold mb-6">Daftar User</h1>
    <a href="{{ route('users.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded mb-4 hover:bg-blue-700 transition duration-300">Tambah Data</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Role</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $user->id }}</td>
                        <td class="py-3 px-6 text-left">{{ $user->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $user->email }}</td>
                        <td class="py-3 px-6 text-left">{{  optional($user->role)->role_name }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-400 text-black py-1 px-3 rounded hover:bg-yellow-500 transition duration-300 inline-block">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700 transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection