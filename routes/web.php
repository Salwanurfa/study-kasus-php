<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\ProdukController;

// Studi Kasus 1 - Sistem Data Siswa
Route::get('/siswa', [SiswaController::class, 'index']);

// Studi Kasus 2 - Sistem Perpustakaan
Route::get('/buku', [BukuController::class, 'index']);

// Studi Kasus 3 - Sistem Kasir Kantin
Route::get('/kasir', [MenuController::class, 'index']);

// Studi Kasus 4 - Sistem Penyewaan Kendaraan
Route::get('/sewa', [KendaraanController::class, 'index']);

// Studi Kasus 5 - Sistem Produk Laravel
Route::get('/produk', [ProdukController::class, 'index']);