<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Toko;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Toko::create([
            'id'=>'1',
        'nama'=>'kosong',
        'alamat'=>'a',
        'jenis_toko'=>'awal',
        'nomor_telepon'=>'0',
        ]);
        Role::create([
            'role_name' => 'owner',
        ]);

        Role::create([
            'role_name' => 'kasir',
        ]);
        
        User::factory(5)->create();

    }
}