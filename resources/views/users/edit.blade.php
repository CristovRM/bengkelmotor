@extends('layouts.app')

@include('dashboard')

@section('title', 'Mengupdate User')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name:</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email:</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password:</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Confirm Password:</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password_confirmation">
        </div>
        <d<div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="roles">Role:</label>
            <select name="roles[]" id="roles" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple required>
                <!-- multiple attribute agar bisa memilih lebih dari satu peran -->
                @foreach($roles as $role)
                    <option value="{{ $role->role }}">{{ $role->role }}</option>
                @endforeach
            </select>
            @error('roles')
                <!-- Error message harus menggunakan 'roles', karena nama field-nya adalah 'roles' -->
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        </div>
    </form>
</div>
@endsection
