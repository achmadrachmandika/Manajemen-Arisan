<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'alamat',
        'no_wa',
        'email',
        'password',
        'status_pembayaran',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Model User.php
public function produk()
{
    return $this->belongsToMany(Produk::class, 'user_produk', 'user_id', 'produk_id')
                ->withPivot([
                     'quantity',
                    'status_bagian_1', 'status_bagian_2', 'status_bagian_3',
                    'status_bagian_4', 'status_bagian_5', 'status_bagian_6',
                    'status_bagian_7', 'status_bagian_8', 'status_bagian_9',
                    'status_bagian_10', 'status_bagian_11',
                ]);
}


  public function bagianPembayaran()
    {
        return $this->hasMany(BagianPembayaran::class);
    }

    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    

}
