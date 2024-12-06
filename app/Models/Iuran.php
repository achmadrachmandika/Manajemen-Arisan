<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;

    // Explicitly define the table name if it differs from the default (plural of model name)
    protected $table = 'iuran'; 

    // Define the fillable columns to prevent mass assignment vulnerabilities
    protected $fillable = ['user_id', 'produk_id', 'is_paid'];

    /**
     * Define the relationship between Iuran and User
     * Each Iuran belongs to one User
     */

      public function userProduk()
    {
        return $this->belongsTo(UserProduk::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship between Iuran and Produk
     * Each Iuran belongs to one Produk
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}

