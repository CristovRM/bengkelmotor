@extends('layouts.app')

@include('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Transaksi Kasir</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('kasir.update', $transaction->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="transaction_time">Waktu Transaksi</label>
                                <input type="datetime-local" name="transaction_time" class="form-control" value="{{ $transaction->transaction_time }}" required>
                            </div>

                            <div class="form-group">
                                <label for="total_price">Total Harga</label>
                                <input type="text" name="total_price" class="form-control" value="{{ $transaction->total_price }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
