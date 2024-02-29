<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/welcome', function (){
    return view('welcome');
});

Route::get('/Dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get ('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);


Route::get('/user/{id}', function ($id) {
    return 'User dengan ID' . $id;
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/users', function () {
        return 'Admin Users';
    });
});

use App\Http\Controllers\ListBarangController;

Route::get('/listbarang', [ListBarangController::class, 'tampilkan'])->name('list_barang');


