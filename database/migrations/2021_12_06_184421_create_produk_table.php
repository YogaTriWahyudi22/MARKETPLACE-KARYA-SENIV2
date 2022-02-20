<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->bigInteger('distributor_produk');
            $table->string('photo', '30');
            $table->string('nama_produk', '30');
            $table->text('deskripsi');
            $table->bigInteger('jenis_karya_seni');
            $table->bigInteger('jumlah_produk');
            $table->bigInteger('harga');
            $table->string('satuan', '20');
            $table->bigInteger('diskon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
