<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\UserController;


Route::resource('users', UserController::class);






Route::middleware(['guest'])->group (function (){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
        
});

    





Route::get('/welcome', function (){
    return view('welcome');
});
Route::get('/home',function (){
  return redirect('/dashboard');
});


Route::get ('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);





    


use App\Http\Controllers\ListBarangController;

Route::get('/listbarang', [ListBarangController::class, 'tampilkan'])->name('list_barang');

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
});



Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');


Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/{id}', [SupplierController::class, 'show'])->name('supplier.show');
Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/Home', [HomeController::class, 'index'])->name('Home');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::middleware(['auth', 'checkRole:admin,kasir'])->group(function () {
    Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('laporan');
    Route::get('/laporan.pdf', [TransaksiController::class, 'laporanPDF'])->name('laporan.pdf');

});









