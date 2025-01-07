<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Relasi ke tabel 'users'
            $table->foreignId('produk_id')->constrained('produk', 'produk_id')->onDelete('cascade');  // Relasi ke tabel 'produk'
            
            // Menambahkan status pembayaran untuk setiap bagian
            for ($i = 1; $i <= 11; $i++) {
                $table->enum("status_bagian_$i", ['terbayar', 'belum_terbayar'])->default('belum_terbayar');
            }
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_produk');
    }
};
