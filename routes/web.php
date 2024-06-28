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
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengeluaranController;


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
    Route::get('/dashboar', [DashboardController::class, 'index'])->name('dashboar');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
});



Route::resource('kategori',KategoriController::class,); 

Route::resource('produk',ProdukController::class,); 

Route::resource('supplier',SupplierController::class,);

Route::resource('pembelian',PembelianController::class,);

Route::resource('pengeluaran',PengeluaranController::class,);

Route::resource('karyawan',KaryawanController::class,);

Route::middleware(['auth'])->group(function () {
Route::resource('transaksi',TransaksiController::class,);

Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('laporan');
Route::get('/laporan.pdf', [TransaksiController::class, 'laporanPDF'])->name('laporan.pdf');


Route::get('transaksi/{id}/cetak', [TransaksiController::class, 'cetak'])->name('transaksi.cetak');
});



Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/Home', [HomeController::class, 'index'])->name('Home');



    










