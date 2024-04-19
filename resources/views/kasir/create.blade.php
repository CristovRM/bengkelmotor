@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8" style="max-width: 800px;">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Tambah Transaksi Kasir</h2>

                <form method="POST" action="{{ route('kasir.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="transaction_time" class="block text-sm font-medium text-gray-700">Waktu Transaksi</label>
                        <input type="datetime-local" name="transaction_time" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="total_price" class="block text-sm font-medium text-gray-700">Total Harga</label>
                        <input type="text" name="total_price" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
                        <a href="{{ route('kasir.index') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-gray-400 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
