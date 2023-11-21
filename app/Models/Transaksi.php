<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = [
        'id',
        'total_pembayaran',
        'uang_pembayaran',
        'kembalian',
        'tanggal_pembayaran',
        'metode_pembayaran',
        'users_id'
    ];

protected $primaryKey = 'id';
public $incrementing = false;
protected $keyType = 'string';
    protected $dates = [
        'tanggal_pembayaran', // Kolom tanggal_pembayaran akan dianggap sebagai Carbon\Carbon instance
    ];

    public function menus()
    {
        return $this->belongsToMany(Item::class)
            ->withPivot('quantity', 'harga');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
