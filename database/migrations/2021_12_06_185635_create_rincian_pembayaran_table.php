<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_rincian_pembayaran');
            $table->bigInteger('id_produk');
            $table->string('photo', '30')->nullable();
            $table->integer('kuantiti');
            $table->bigInteger('jumlah_pembayaran');
            $table->string('status', '20');
            $table->time('waktu_pemesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rincian_pembayaran');
    }
}
