@extends('layouts.app')

@include('kasir.dashboard')

@section('title', 'Tambah Data Transaksi')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Tambah Transaksi</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_pembeli" class="block text-gray-700 text-sm font-bold mb-2">Nama Pembeli</label>
            <input type="text" name="nama_pembeli" id="nama_pembeli" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nama_pembeli') }}">
        </div>
        <div class="mb-4">
            <label for="id_produk" class="block text-gray-700 text-sm font-bold mb-2">Produk</label>
            <select name="id_produk" id="id_produk" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @foreach ($produk as $item)
                    <option value="{{ $item->id_produk }}" data-harga="{{ $item->harga_jual }}">{{ $item->nama_produk }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="jumlah" class="block text-gray-700 text-sm font-bold mb-2">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('jumlah') }}">
        </div>
        <div class="mb-4">
            <label for="total_harga" class="block text-gray-700 text-sm font-bold mb-2">Total Harga</label>
            <input type="text" name="total_harga" id="total_harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
    </form>
</div>

<script>
    document.getElementById('jumlah').addEventListener('input', function() {
        var jumlah = this.value;
        var produkSelect = document.getElementById('id_produk');
        var harga = produkSelect.options[produkSelect.selectedIndex].getAttribute('data-harga');
        var totalHarga = jumlah * harga;
        document.getElementById('total_harga').value = totalHarga;
    });

    document.getElementById('id_produk').addEventListener('change', function() {
        var jumlah = document.getElementById('jumlah').value;
        var harga = this.options[this.selectedIndex].getAttribute('data-harga');
        var totalHarga = jumlah * harga;
        document.getElementById('total_harga').value = totalHarga;
    });
</script>
@endsection
