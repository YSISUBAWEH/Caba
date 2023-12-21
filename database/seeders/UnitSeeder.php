<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        Unit::create(['name' => 'Porsi']);
        Unit::create(['name' => 'Buah']);
        Unit::create(['name' => 'Kg']);
        // Tambahkan unit lain sesuai kebutuhan jenis usaha
    }
}
