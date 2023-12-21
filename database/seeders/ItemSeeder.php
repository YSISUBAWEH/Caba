<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Kategori;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $units = Unit::pluck('id')->toArray();
        $kategoris = Kategori::pluck('id')->toArray();

        $itemsData = [
            [
                'sku' => 'SKU-001',
                'name' => 'Nasi Goreng Spesial',
                'harga' => 25000,
                'stok' => 50,
                'kode_kate' => $this->randomValue($kategoris),
                'kode_uk' => $this->randomValue($units),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        foreach ($itemsData as $itemData) {
            Item::create($itemData);
        }
    }

    private function randomValue($array)
    {
        return $array[array_rand($array)];
    }
}
