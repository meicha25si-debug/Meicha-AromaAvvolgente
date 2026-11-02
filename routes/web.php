
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukKueController;
use App\Http\Controllers\KategoriKueController;
use App\Http\Controllers\UserController;

// Halaman Guest
Route::view('/', 'guest.home')->name('guest.home');

// Dashboard Admin
Route::get('/admin', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

// CRUD Produk Kue
Route::resource('produk-kue', ProdukKueController::class);

// CRUD Kategori Kue
Route::resource('kategori-kue', KategoriKueController::class);

// CRUD Pelanggan
Route::resource('pelanggan', PelangganController::class);

// CRUD User
Route::resource('user', UserController::class);
