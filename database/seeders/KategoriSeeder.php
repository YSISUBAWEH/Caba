<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Kategori::create(['name' => 'Makanan dan Minuman']);
        Kategori::create(['name' => 'Elektronik']);
        Kategori::create(['name' => 'Kelontong']);
        Kategori::create(['name' => 'Fashion']);
        Kategori::create(['name' => 'Kecantikan']);
        Kategori::create(['name' => 'Otomotif']);
        Kategori::create(['name' => 'Buku']);
        Kategori::create(['name' => 'Sepatu']);
        Kategori::create(['name' => 'Hobi dan Mainan']);
        Kategori::create(['name' => 'Kesehatan']);
        Kategori::create(['name' => 'Perhiasan']);
        Kategori::create(['name' => 'Seni']);
        Kategori::create(['name' => 'Outdoor dan Petualangan']);
        Kategori::create(['name' => 'Musik']);
        Kategori::create(['name' => 'Peralatan Olahraga']);
        // Tambahkan kategori lain sesuai kebutuhan jenis usaha
    }}
