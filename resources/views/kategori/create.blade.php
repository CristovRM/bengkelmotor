<!-- resources/views/kategori/create.blade.php -->

@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tambah Kategori Baru</h1>
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Kategori:</label>
                        <input type="text" class="form-control" id="nama" nama="nama">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
