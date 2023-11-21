<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    use HasFactory;
     public $table = "toko";
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'jenis_toko',
        'nomor_telepon',
    ];
}
