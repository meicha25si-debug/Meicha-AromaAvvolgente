<?php

use Illuminate\Support\Facades\Route;

// Halaman publik (Guest) menggunakan template ChocoLux.
Route::view('/', 'guest.home')->name('guest.home');

// Halaman dashboard administrator menggunakan template DarkPan.
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');
