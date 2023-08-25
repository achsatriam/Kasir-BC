<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!empty($request->kategori)) {
            $produk = Produk::where('kategori_id', $request->kategori)->get();
        } else {
            $produk = Produk::all();
        }
        $kategori = Kategori::all();
        return view ('produk.masterproduk', compact('produk', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view ('produk.addproduk',compact ('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            'foto' => 'required',
        ]);

        $produk= new Produk();

        $produk->nama_produk=$request->nama_produk;

        $produk->harga=$request->harga;

        $produk->stok=$request->stok;
        
        $produk->kategori_id=$request->kategori_id;

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
        $kategori = Kategori::all();
        return view('produk.editproduk', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            'foto' => 'required',
        ]);

        $produk = Produk::find($id);
        
        $produk->nama_produk=$request->nama_produk;
        
        $produk->harga=$request->harga;

        $produk->stok=$request->stok;

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
