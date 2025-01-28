<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('iuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_produk_id')->constrained('user_produk')->onDelete('cascade'); // Relasi ke user_produk
            $table->integer('bagian_ke'); // Menyimpan nomor bagian (misalnya: 1, 2, 3, ...)
            $table->decimal('jumlah_iuran', 10, 2); // Jumlah iuran yang harus dibayar
            $table->boolean('is_paid')->default(false); // Status pembayaran untuk bagian tertentu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran');
    }
};
