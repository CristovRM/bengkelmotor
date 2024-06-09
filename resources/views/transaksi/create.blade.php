@extends('layouts.app')

@include('kasir.dashboard')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Tambah Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_pembeli" class="block text-gray-700">Nama Pembeli:</label>
            <input type="text" name="nama_pembeli" id="nama_pembeli" class="w-full px-4 py-2 border rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="nama_produk" class="block text-gray-700 font-bold mb-2">Nama Produk:</label>
            <select id="nama_produk" name="nama_produk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($produk as $produk)
                    <option value="{{ $produk['nama_produk'] }}" data-harga="{{ $produk['harga_jual'] }}">{{ $produk['nama_produk'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="jumlah" class="block text-gray-700">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" class="w-full px-4 py-2 border rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="total_harga" class="block text-gray-700">Total Harga:</label>
            <input type="number" name="total_harga" id="total_harga" class="w-full px-4 py-2 border rounded-md" readonly>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const namaProduk = document.getElementById('nama_produk');
        const jumlahInput = document.getElementById('jumlah');
        const totalHarga = document.getElementById('total_harga');

        function calculateTotal() {
            const selectedOption = namaProduk.options[namaProduk.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            const jumlah = jumlahInput.value;
            if (harga && jumlah) {
                totalHarga.value = harga * jumlah;
            } else {
                totalHarga.value = 0;
            }
        }

        namaProduk.addEventListener('change', calculateTotal);
        jumlahInput.addEventListener('input', calculateTotal);
    });
</script>
@endsection
