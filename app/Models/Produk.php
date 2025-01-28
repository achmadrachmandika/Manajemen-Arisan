<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
     use HasFactory;

    // Define the table name if it differs from the default
    protected $table = 'produk';

    // Define the primary key if it's not the default 'id'
    protected $primaryKey = 'produk_id';

    // Define the fields that are mass assignable
    protected $fillable = [
        'nama',
        'deskripsi',
        'kategori',
        'harga',
        'photo',
        'tanggal',
         'quantity',
    ];

    // Define the types for casting (optional)
    protected $casts = [
        'tanggal' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    // Model Produk.php
  // Relasi dengan User melalui tabel pivot user_produk
   public function users()
    {
        return $this->belongsToMany(User::class, 'user_produk', 'produk_id', 'user_id')
                    ->withPivot([
                        'quantity', // Menyimpan quantity produk yang dipilih
                        'status_bagian_1', 'status_bagian_2', 'status_bagian_3',
                        'status_bagian_4', 'status_bagian_5', 'status_bagian_6',
                        'status_bagian_7', 'status_bagian_8', 'status_bagian_9',
                        'status_bagian_10', 'status_bagian_11',
                    ]);
    }

}


