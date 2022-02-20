<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktur', function (Blueprint $table) {
            $table->bigIncrements('kode_faktur');
            $table->bigInteger('id_pay');
            $table->bigInteger('id_user');
            $table->bigInteger('id_kota');
            $table->bigInteger('id_kurir');
            $table->bigInteger('id_rincian_pembayaran');
            $table->date('tanggal_bayar');
            $table->string('konfirmasi', '50');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faktur');
    }
}
