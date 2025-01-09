<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProduk extends Model
{
    use HasFactory;
     protected $table = 'user_produk';  // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
    'user_id', 
    'produk_id', 
    'status_bagian_1', 
    'status_bagian_2', 
    'status_bagian_3', 
    'status_bagian_4', 
    'status_bagian_5', 
    'status_bagian_6', 
    'status_bagian_7', 
    'status_bagian_8', 
    'status_bagian_9', 
    'status_bagian_10', 
    'status_bagian_11'
];


    // Relasi dengan Iuran
    public function iurans()
    {
        return $this->hasMany(Iuran::class, 'user_produk');
    }

    
}
