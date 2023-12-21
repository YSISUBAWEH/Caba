<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    public $table = "kategori";
    protected $fillable = [
        'kode_kate','name',
    ];


    public function item(): HasMany
    {
        return $this->hasMany(Item::class,'kode_kate','kode_kate');
    }
    public function uk(): HasMany
    {
        return $this->hasMany(Unit::class);
    }
}
