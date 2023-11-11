<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplayer extends Model
{
    use HasFactory;
    public $table = "suplayer";
    protected $fillable = [
        'id','name','alamat','telepon','deskripsi',
    ];

protected $primaryKey = 'id';
public $incrementing = false;
protected $keyType = 'string';
    public function stoks()
    {
        return $this->hasMany(Stok::class, 'suplayer_id');
    }
}
