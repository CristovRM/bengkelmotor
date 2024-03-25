<!-- resources/views/kategori/show.blade.php -->

@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Kategori</h1>
                <div>
                    <strong>id_kategori:</strong> {{ $kategori->id_kategori }}<br>
                    <strong>Nama Kategori:</strong> {{ $kategori->name }} <br>
                </div>
                <a href="{{ route('kategori.index') }}" class="btn btn-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
