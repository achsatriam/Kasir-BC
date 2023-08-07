<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StokController;
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

//Admin
Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

//Stok
Route::get('/stok', [StokController::class, 'index'])->name('stok');

//Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

Route::get('/addProduk', [ProdukController::class, 'create'])->name('addproduk');

Route::post('produk', [ProdukController::class, 'store']);

Route::get('produk/edit/{id}', [ProdukController::class, 'edit']);

Route::post('produk/update/{id}', [ProdukController::class, 'update']);

Route::delete('produk/{id}', [ProdukController::class, 'destroy']);
