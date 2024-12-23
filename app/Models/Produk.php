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
    ];

    // Define the types for casting (optional)
    protected $casts = [
        'tanggal' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    // Model Produk.php
public function users()
{
    return $this->belongsToMany(User::class, 'user_produk', 'produk_id', 'user_id');
}

}


