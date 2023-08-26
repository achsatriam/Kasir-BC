<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {

        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('pembayaran.masterpembayaran', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
