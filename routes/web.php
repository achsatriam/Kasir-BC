<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Payment
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

//Report
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');

//Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

Route::get('/addproduk', [ProdukController::class, 'create'])->name('addproduk');

Route::post('produk', [ProdukController::class, 'store']);

Route::get('produk/edit/{id}', [ProdukController::class, 'edit']);

Route::post('produk/update/{id}', [ProdukController::class, 'update']);

Route::delete('produk/{id}', [ProdukController::class, 'destroy']);

//Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');

Route::get('/addkategori', [KategoriController::class, 'create'])->name('addkategori');

Route::post('kategori', [KategoriController::class, 'store']);

Route::get('kategori/edit/{id}', [KategoriController::class, 'edit']);

Route::post('kategori/update/{id}', [KategoriController::class, 'update']);

Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);
