@extends('layouts.app')

@include('dashboard')

@section('title', 'Laporan Transaksi')

@section('content')
<div class="container mx-auto px-4 py-8" style="width: 800px;">
    <h1 class="text-2xl font-bold mb-4">Laporan Transaksi</h1>
    <p>Transaksi oleh {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('msg') }}
        </div>
    @endif

    @foreach ($laporan as $bulan => $dataBulan)
        <h2 class="text-xl font-semibold mt-6 mb-2">{{ $bulan }}</h2>
        @if (count($dataBulan['transaksi']) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="w-full bg-gray-200 text-left text-gray-700 uppercase text-sm leading-normal">
                            <th class="px-4 py-2">ID Transaksi</th>
                            <th class="px-4 py-2">Nama Pembeli</th>
                            <th class="px-4 py-2">Nama Produk</th>
                            <th class="px-4 py-2">Jumlah</th>
                            <th class="px-4 py-2">Total Harga</th>
                            <th class="px-4 py-2">Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataBulan['transaksi'] as $transaksiItem)
                            <tr>
                                <td class="border px-4 py-2">{{ $transaksiItem['id'] }}</td>
                                <td class="border px-4 py-2">{{ $transaksiItem['nama_pembeli'] }}</td>
                                <td class="border px-4 py-2">{{ $transaksiItem['nama_produk'] }}</td>
                                <td class="border px-4 py-2">{{ $transaksiItem['jumlah'] }}</td>
                                <td class="border px-4 py-2">{{ number_format($transaksiItem['total_harga'], 2) }}</td>
                                <td class="border px-4 py-2">{{ $transaksiItem['created_at'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full bg-gray-200 text-left text-gray-700 uppercase text-sm leading-normal">
                <p class="font-semibold border px-4 py-2">Total Transaksi: {{ $dataBulan['total_transaksi'] }}</p>
                <p class="font-semibold border px-4 py-2">Total Jumlah: {{ number_format($dataBulan['total_amount'], 2) }}</p>
            </div>
        @else
            <p class="mt-4">Tidak ada transaksi pada bulan ini.</p>
        @endif
    @endforeach

    <div class="mt-4">
        <button id="export-pdf" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan Ke PDF</button>
    </div>
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
