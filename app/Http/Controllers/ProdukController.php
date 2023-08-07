<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\File; 

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view ('produk.masterproduk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        return view ('produk.addproduk',compact ('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk= new Produk();

        $produk->nama_produk=$request->nama_produk;

        $produk->harga=$request->harga;

        if ($request->file('foto')) {
            $request->file('foto')->move('post-images/', $request->file('foto')->getClientOriginalName());
            $produk->foto = $request->file('foto')->getClientOriginalName();  
        }

        $produk->save();

        return redirect('produk')->with('success', 'Produk Produk Berhasil Ditambah!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::find($id);
        return view('produk.editproduk', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        
        $produk->nama_produk=$request->nama_produk;
        $produk->harga=$request->harga;

        if ($request->file('foto')) {
            File::delete('post-images/'. $produk->foto);
            $request->file('foto')->move('post-images/', $request->file('foto')->getClientOriginalName());
            $produk->foto = $request->file('foto')->getClientOriginalName();  
        }
        
        $produk->update();

        return redirect('produk')->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produk::destroy($id);
        return response()->json(['status' => 'Produk Berhasil di hapus!']);
    }
}
