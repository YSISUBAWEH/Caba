<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    public $table = "ukuran";
    protected $fillable = [
        'name','kode_uk',
    ];


    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
