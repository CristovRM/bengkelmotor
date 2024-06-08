@extends('layouts.app')

@include('dashboard')

@section('title', 'Detail Member')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Detail Member</h1>

    <ul>
        <li><strong>Nama:</strong> {{ $member['name'] }}</li>
        <li><strong>Email:</strong> {{ $member['email'] }}</li>
        <li><strong>Telepon:</strong> {{ $member['phone'] }}</li>
        <li><strong>Alamat:</strong> {{ $member['address'] }}</li>
    </ul>

    <a href="{{ route('member.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Kembali ke daftar Member
    </a>
</div>
@endsection
