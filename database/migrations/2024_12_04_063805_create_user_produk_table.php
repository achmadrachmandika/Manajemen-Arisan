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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel 'users'
            $table->foreignId('produk_id')->constrained('produk', 'produk_id')->onDelete('cascade'); // Relasi ke tabel 'produk'
            $table->integer('quantity')->default(0); // Menambahkan kolom quantity untuk menyimpan jumlah produk yang dipilih
            $table->decimal('total_harga', 10, 2); // Total harga untuk produk ini
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
