@extends('layouts.app')

@include('kasir.dashboard')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container mx-auto px-4 py-8" style="max-width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Tambah Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST" id="transaksiForm">
        @csrf
        <div class="mb-4">
            <label for="nama_pembeli" class="block text-gray-700">Nama Pembeli:</label>
            <input type="text" name="nama_pembeli" id="nama_pembeli" class="w-full px-4 py-2 border rounded-md" required>
        </div>
        
        <div id="product-list">
            <div class="product-item mb-4">
                <label for="produk[0][nama_produk]" class="block text-gray-700 font-bold mb-2">Nama Produk:</label>
                <select name="produk[0][nama_produk]" class="produk-select shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="calculateTotal()" required>
                    @foreach($produk as $produkItem)
                        <option value="{{ $produkItem['nama_produk'] }}" data-harga="{{ $produkItem['harga_jual'] }}" data-stok="{{ $produkItem['stok'] }}">{{ $produkItem['nama_produk'] }} - Stok: {{ $produkItem['stok'] }}</option>
                    @endforeach
                </select>
                
                <label for="produk[0][jumlah]" class="block text-gray-700 mt-2">Jumlah:</label>
                <input type="number" name="produk[0][jumlah]" class="produk-jumlah w-full px-4 py-2 border rounded-md" required oninput="calculateTotal()">
            </div>
        </div>
        
        <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-4" onclick="addProduct()">Tambah Produk</button>
        
        <div class="mb-4">
            <label for="total_harga" class="block text-gray-700">Total Harga:</label>
            <input type="number" name="total_harga" id="total_harga" class="w-full px-4 py-2 border rounded-md" readonly>
        </div>
        
        <div class="mb-4">
            <label for="payment_method" class="block text-gray-700">Metode Pembayaran:</label>
            <select id="payment_method" name="payment_method" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required onchange="checkPaymentMethod()">
                <option value="cash">Cash</option>
                <option value="credit_card">Credit Card</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600" id="submitButton">Simpan</button>
    </form>
</div>

<script>
    function addProduct() {
        var productList = document.getElementById('product-list');
        var productCount = productList.getElementsByClassName('product-item').length;

        var newProduct = document.createElement('div');
        newProduct.classList.add('product-item', 'mb-4');
        newProduct.innerHTML = `
            <label for="produk[${productCount}][nama_produk]" class="block text-gray-700 font-bold mb-2">Nama Produk:</label>
            <select name="produk[${productCount}][nama_produk]" class="produk-select shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="calculateTotal()" required>
                @foreach($produk as $produkItem)
                    <option value="{{ $produkItem['nama_produk'] }}" data-harga="{{ $produkItem['harga_jual'] }}" data-stok="{{ $produkItem['stok'] }}">{{ $produkItem['nama_produk'] }} - Stok: {{ $produkItem['stok'] }}</option>
                @endforeach
            </select>
            
            <label for="produk[${productCount}][jumlah]" class="block text-gray-700 mt-2">Jumlah:</label>
            <input type="number" name="produk[${productCount}][jumlah]" class="produk-jumlah w-full px-4 py-2 border rounded-md" required oninput="calculateTotal()">
        `;

        productList.appendChild(newProduct);
    }

    function calculateTotal() {
        var productItems = document.getElementsByClassName('product-item');
        var totalHarga = 0;

        for (var i = 0; i < productItems.length; i++) {
            var jumlah = parseInt(productItems[i].querySelector('.produk-jumlah').value);
            var harga = parseFloat(productItems[i].querySelector('.produk-select').options[productItems[i].querySelector('.produk-select').selectedIndex].getAttribute('data-harga'));
            totalHarga += jumlah * harga;
        }

        document.getElementById('total_harga').value = totalHarga.toFixed(2);
    }

    function checkPaymentMethod() {
        var paymentMethod = document.getElementById('payment_method').value;

        if (paymentMethod === 'credit_card') {
            if (!confirm('Anda memilih pembayaran dengan Credit Card. Lanjutkan?')) {
                document.getElementById('submitButton').disabled = true;
                return false;
            }
        }

        document.getElementById('submitButton').disabled = false;
    }

    checkPaymentMethod();
</script>
@endsection
