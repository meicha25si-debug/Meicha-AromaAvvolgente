<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriKueController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukKueController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Halaman Guest
Route::view('/', 'guest.home')->name('guest.home');

// Dashboard Admin
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CRUD Kategori Kue
Route::resource('kategori-kue', KategoriKueController::class);

// CRUD Pelanggan
Route::resource('pelanggan', PelangganController::class);

// CRUD Produk Kue
Route::resource('produk-kue', ProdukKueController::class);

// CRUD User
Route::resource('user', UserController::class);
