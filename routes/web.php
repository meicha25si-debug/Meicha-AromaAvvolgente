
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukKueController;
use App\Http\Controllers\KategoriKueController;

// Halaman publik (Guest)
Route::view('/', 'guest.home')->name('guest.home');

// Halaman dashboard Admin
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

// CRUD Produk Kue
Route::resource('produk-kue', ProdukKueController::class);

Route::resource('kategori-kue', KategoriKueController::class);

Route::resource('pelanggan', PelangganController::class);
