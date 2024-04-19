@extends('layouts.app')

@include('dashboard')

@section('content')
     <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden">
            <div class="py-4 px-6">
               <h1 class="text-2xl font-bold mb-4">Detail Transaksi Kasir</h1>
                    <div>
                        <p><strong>ID Transaksi: {{ $transaction->id }}<p></strong>
                        <p><strong>Waktu Transaksi: {{ $transaction->transaction_time }}<p></strong>
                        <p><strong>Total Harga: {{ $transaction->total_price }}<p></strong>
                    </div>     
                    <a href="{{ route('kasir.index') }}" class="block text-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mt-3">Kembali</a>            
            </div>
        </div>
    </div>
@endsection
