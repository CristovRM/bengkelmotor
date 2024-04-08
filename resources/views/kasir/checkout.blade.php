<!-- resources/views/kasir/checkout.blade.php -->
@extends('kasir.layout')

@section('title', 'Checkout')

@section('content')
    <h1>Halaman Checkout</h1>
    <!-- Formulir pembayaran dan pengiriman -->
    <form action="/kasir/checkout" method="POST">
        <!-- Input form, informasi pengiriman, pembayaran, dll. -->
        <button type="submit">Checkout</button>
    </form>
@endsection
