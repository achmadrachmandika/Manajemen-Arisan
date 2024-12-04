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
    Schema::create('produk', function (Blueprint $table) {
        $table->bigIncrements('produk_id'); // Primary key yang auto-increment
        $table->string('nama', 50);
        $table->string('deskripsi');
        $table->bigInteger('harga'); // Tidak perlu auto_increment
        $table->enum('kategori', ['Sembako', 'Minuman', 'Kue/Jajan', 'Paket Kue', 'Paket Snack', 'Tabungan dan Mebel']);
        $table->text('photo');
        $table->date('tanggal');
        $table->timestamps(); // Menambahkan created_at dan updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
