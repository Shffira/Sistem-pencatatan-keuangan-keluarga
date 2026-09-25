<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;

// 1. Halaman Utama (Dashboard)
Route::get('/', [TransaksiController::class, 'index'])->name('dashboard');

Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');;

// 2. Route CRUD Transaksi (Gunakan resource saja, TIDAK PERLU ditulis manual satu-satu)
Route::resource('transaksi', TransaksiController::class);

// 3. Settings Route
require __DIR__.'/settings.php';

