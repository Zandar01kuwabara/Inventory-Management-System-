<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('barang', BarangController::class)->parameters(['barang' => 'barang']);
Route::resource('kategori', KategoriController::class)->parameters(['kategori' => 'kategori']);
