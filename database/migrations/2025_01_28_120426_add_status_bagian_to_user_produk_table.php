<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusBagianToUserProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_produk', function (Blueprint $table) {
            // Menambahkan kolom untuk status bagian (misal status_bagian_1, status_bagian_2, dst.)
            for ($i = 1; $i <= 50; $i++) {
                $table->enum("status_bagian_$i", ['terbayar', 'belum_terbayar'])->default('belum_terbayar');
            }

            // Menambahkan kolom jumlah_bagian untuk menyimpan jumlah bagian produk
            $table->integer('jumlah_bagian')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_produk', function (Blueprint $table) {
            // Menghapus kolom status_bagian_X dan jumlah_bagian
            for ($i = 1; $i <= 50; $i++) {
                $table->dropColumn("status_bagian_$i");
            }

            $table->dropColumn('jumlah_bagian');
        });
    }
}
