<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Kategori::create(['kategori' => 'makanan']);
        Kategori::create(['kategori' => 'minuman']);
        Kategori::create(['kategori' => 'pakaian']);

        Produk::create([
            'nama_produk' => 'lontong',
            'harga' => 2000,
            'stok' => 3,
            'kategori_id' => 1,
            'foto' => 'https://media.istockphoto.com/id/1470077328/id/foto/irisan-lontong-lontong-panjang-dari-indonesia.webp?b=1&s=170667a&w=0&k=20&c=AJ4uFMKjOLsLImJmenH7-pgOnhzmL8v3tUxvvAbbyds='
        ]);
        Produk::create([
            'nama_produk' => 'Jus Jeruk',
            'harga' => 5000,
            'stok' => 2,
            'kategori_id' => 2,
            'foto' => 'https://media.istockphoto.com/id/178713144/id/foto/sari-buah-jeruk.webp?b=1&s=170667a&w=0&k=20&c=7R25r7powsFPzaeDZVl1gLChoNf7-16XqRtibzY55Uw='
        ]);
        Produk::create([
            'nama_produk' => 'T-Shirt',
            'harga' => 100000,
            'stok' => 1,
            'kategori_id' => 3,
            'foto' => 'https://media.istockphoto.com/id/135751015/id/foto/kemeja-tee-kapas-daur-ulang-kosong.webp?b=1&s=170667a&w=0&k=20&c=_oeAY8_40JmS7FMgtvZmIKsfl2gyZZYvG--pOgqNqo8='
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
