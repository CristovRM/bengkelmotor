@extends('layouts.app')

@include('dashboard')

@section('title', 'Laporan Transaksi')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Laporan Transaksi</h1>
    <p>Transaksi oleh {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>
    @if($transaksi->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nama Kasir</th>
                    <th class="px-4 py-2">ID Transaksi</th>
                    <th class="px-4 py-2">Nama Produk</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Total Harga</th>
                    <th class="px-4 py-2">Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi as $item)
                <tr>
                    <td class="border px-4 py-2">{{ optional($item->kasir)->role }}</td>
                    <td class="border px-4 py-2">{{ $item->id }}</td>
                    <td class="border px-4 py-2">{{ $item->produk->nama_produk }}</td>
                    <td class="border px-4 py-2">{{ $item->jumlah }}</td>
                    <td class="border px-4 py-2">{{ formatRupiah($item->total_harga)}}</td>
                    <td class="border px-4 py-2">{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <button id="export-pdf" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan Ke PDF</button>
    </div>
    @else
    <p>Tidak ada transaksi yang ditemukan.</p>
    @endif
</div>

<script>
    document.getElementById('export-pdf').addEventListener('click', function() {
        fetch("{{ route('laporan.pdf') }}") 
            .then(response => response.blob())
            .then(blob => {
                const url = window.URL.createObjectURL(new Blob([blob]));
                const a = document.createElement('a');
                a.href = url;
                a.download = 'laporan_transaksi.pdf';
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
            });
    });
</script>


@endsection
