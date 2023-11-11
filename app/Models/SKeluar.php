<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKeluar extends Model
{
    use HasFactory;

    public $table = "stok_keluar";
    protected $fillable = [
        'id',
        'item_id',
        'users_id',
        'stok',
        'deskripsi',
    ];
protected $primaryKey = 'id';
public $incrementing = false;
protected $keyType = 'string';

     public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
