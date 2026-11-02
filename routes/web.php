<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukKueController;
use App\Http\Controllers\KategoriKueController;
use App\Http\Controllers\UserController;

// Halaman publik (Guest)
Route::view('/', 'guest.home')->name('guest.home');

// Dashboard Admin: ringkasan data memakai Query Builder dan Eloquent.
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

// CRUD Produk Kue
Route::resource('produk-kue', ProdukKueController::class);

Route::resource('kategori-kue', KategoriKueController::class);

Route::resource('pelanggan', PelangganController::class);

Route::resource('user', UserController::class);
