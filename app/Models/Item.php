<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
     public $table = "item";
    protected $fillable = [
        'id',
        'name',
        'harga',
        'kode_kate',
        'kode_uk',
        'img','stok',
        'SKU',
    ];
protected $primaryKey = 'id';
public $incrementing = false;
protected $keyType = 'string';
    public function kate()
    {
        return $this->belongsTo(Kategori::class, 'kode_kate', 'kode_kate');
    }
    public function uk()
    {
        return $this->belongsTo(Unit::class, 'kode_uk', 'kode_uk');
    }
}
