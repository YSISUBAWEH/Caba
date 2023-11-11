<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMasuk extends Model
{
    use HasFactory;

    public $table = "stok_masuk";
    protected $fillable = [
        'id',
        'item_id',
        'suplayer_id',
        'stok',
        'deskripsi',
    ];
protected $primaryKey = 'id';
public $incrementing = false;
protected $keyType = 'string';

     public function suplayer()
    {
        return $this->belongsTo(Suplayer::class, 'suplayer_id');
    }

    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
