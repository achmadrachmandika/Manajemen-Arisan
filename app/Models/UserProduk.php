<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProduk extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'produk_id'];

    // Relasi dengan Iuran
    public function iurans()
    {
        return $this->hasMany(Iuran::class, 'user_produk');
    }
}
