<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagianPembayaran extends Model
{
     use HasFactory;

    protected $fillable = [
        'user_id', 'produk_id', 'nomor_bagian', 'status_pembayaran',
    ];

    // Relasi BagianPembayaran -> User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi BagianPembayaran -> Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
