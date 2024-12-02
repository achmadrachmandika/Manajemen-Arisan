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
            $table->increments('id'); 
            $table->string('nama', 50);
            $table->string('deskripsi');
            $table->bigInteger('harga');
            $table->enum('kategori', ['Sembako', 'Minuman', 'Kue/Jajan', 'Paket Kue', 'Paket Snack', 'Tabungan dan Mebel']);
            $table->text('photo');
            $table->date('tanggal');
            $table->timestamps(); // Adds both created_at and updated_at columns
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
